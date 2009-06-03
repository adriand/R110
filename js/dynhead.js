function render() {
  // draw the table based on x and ylimits
  for (i = 0;i < this.ylimit;i++) {
    cells = "";
    for (j = 0;j < this.xlimit;j++) {
      cells += "<td></td>";
    }
    $("<tr>" + cells + "</tr>").appendTo(this.table);
  }
  
  this.xwidth = Math.round($(this.table).width() / this.xlimit);
  $(this.table + " tr td").css({ "width" : this.xwidth + "px", "height" : this.xwidth + "px" });
}

function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// TODO: use an options hash here
function update(x, y, opacity, colour, post_to_server) {
  if (!colour) {
		var colours = new Array("pink", "blue");
		var index = getRandomInt(0, colours.length - 1); // Math.floor(Math.random() * (colours.length - 1)); // Math.random() * colours.length;
		colour = colours[index];
	}
  if (!opacity) { opacity = 1; }
  if (post_to_server) {
    $.post(this.dback + "/update", { x: x / this.xwidth, y: y / this.xwidth }, function(data) { go_home(); });
  }
  // correct widths so the placed object is centered (since it is placed according to top-left coordinate)
  var width_correction = this.unit_width / 2;
  x -= width_correction;
  y -= width_correction;
	var grid_view = this;
  $("<img class='unit' src='" + this.image_path + "/" + colour + ".png' />").css({ "left":x + "px", "top":y + "px", "opacity": 0 }).appendTo(this.container).fadeTo("fast", opacity).click(function () { go_home(); });
}

// load grid data points from web service
function load_points() {
  var gv = this;
  
  if (last_update != "") {
    // epochs
    last_update = Math.round(last_update.getTime() / 1000.0)
  }
  
  $.get(this.dback + "/points", { last_update: last_update }, function(data) {
    var items = eval(data);
    $.each(items, function(i,item) {
      gv.update(item.x * gv.xwidth, item.y * gv.xwidth, item.opacity / 100);
    });
  });
  last_update = new Date;
}

// not part of any object
function click_update(e) {
  // clicks should snap to grid  
  // do this by dividing by xwidth, rounding the result, then multiplying by that
	// turns out that the snap could probably be relaxed somewhat...what if we played with some different values?
	// original is that the snap is simply grid_view.xwidth
	var snap = grid_view.xwidth / 2;
  var x = (e.pageX - $(grid_view.container).offset().left);
  x = Math.round(x / snap) * snap;
	var y = (e.pageY - $(grid_view.container).offset().top);
	y = Math.round(y / snap) * snap;
	
	grid_view.update(x, y, null, null, true);
}

function go_home() {
	if (window.location.toString() != grid_view.home + "/") {
		window.location = grid_view.home;
	}
}

function load_signature() {
  // hard-coded signature, drawn in the header
  signature = [{"y":14,"opacity":100,"x":2},{"y":13,"opacity":100,"x":3},{"y":12,"opacity":100,"x":4},{"y":13,"opacity":100,"x":5},{"y":14,"opacity":100,"x":6},{"y":14,"opacity":100,"x":4},{"y":14,"opacity":100,"x":8},{"y":12,"opacity":100,"x":8},{"y":13,"opacity":100,"x":10},{"y":14,"opacity":100,"x":12},{"y":12,"opacity":100,"x":12},{"y":13,"opacity":100,"x":13},{"y":14,"opacity":100,"x":14},{"y":12,"opacity":100,"x":14}];
  
  $.each(signature, function(i, points) {
    grid_view.update(points.x * grid_view.xwidth, points.y * grid_view.xwidth, 1, "black");
  });
}

function GridView(options) {
  this.xlimit = options['xlimit'];
  this.ylimit = options['ylimit'];
  this.dback = options['dback'];  
  this.table = options['table'];
  this.container = options['container'];
  this.unit_width = options['unit_width'];
	this.home = options['home'] || '/';
	this.image_path = options['image_path'];

	this.xwidth = 0;
  
  // methods
  this.render = render;
  this.update = update;
  this.load_points = load_points; 
  
  // events
  $(this.table).bind("click", { grid_view : this }, click_update);
}

var grid_view;
var last_update;