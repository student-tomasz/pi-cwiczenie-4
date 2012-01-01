var Destroyer = function() {
  var that = this;

  this.destroy = function(id) {
    var data = new FormData();
    data.append('id', id);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(e) {
      if (request.readyState === 4) {
        if (request.status === 200) {
          updater.update();
          console.log('[notice]', 'file destroyed successfully');
        }
        else {
          console.log('[error]', 'file destroy failed');
        }
      }
    };

    request.open('POST', 'destroy.php', true);
    request.setRequestHeader("Cache-Control", "no-cache");
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.send(data);
  };

  this.init = function() {
  };
};
