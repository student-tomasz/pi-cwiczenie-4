var Converter = function() {
  var that = this;

  this.showDialog = function(id) {
    var args = {
      id: id,
      name: element('file-' + id + '-name').textContent
    };
    var results = window.showModalDialog('convert.html', args, "dialogheight: 480, dialogwidth: 640, resizeable: no, scroll: no");
    if (results) {
      this.convert(id, results.from, results.to);
      console.log('[notice]', 'calling file conversion with args:', id, results.from, results.to);
    }
    else {
      console.log('[notice]', 'file convertion cancelled');
    }
  };

  this.convert = function(id, from, to) {
    var data = new FormData();
    data.append('id', id);
    data.append('from', from);
    data.append('to', to);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(e) {
      if (request.readyState === 4) {
        if (request.status === 200) {
          console.log('[notice]', 'file converted successfully');
        }
        else {
          console.log('[error]', 'file convertion failed');
        }
      }
    };

    request.open('POST', 'convert.php', true);
    request.setRequestHeader("Cache-Control", "no-cache");
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.send(data);
  };

  this.init = function() {
  };
};
