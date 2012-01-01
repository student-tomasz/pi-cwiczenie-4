var Updater = function() {
  var that = this;

  var listing = element('files-table-body');

  this.update = function() {
    var request = new XMLHttpRequest();
    request.open('GET', 'index.php', true);
    request.onreadystatechange = function (event) {  
      if (request.readyState === 4) {  
        if (request.status === 200) {  
          listing.innerHTML = request.responseText;
        } else {  
          console.log("[error]", request.status, request.statusText);  
        }  
      }  
    };  
    request.send(null);
  };

  this.init = function() {
    that.update();
  };
};
