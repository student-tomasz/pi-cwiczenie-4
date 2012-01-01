var Uploader = function() {
  var form =   element('upload-form');
  var input =  element('upload-input');
  var submit = element('upload-submit');

  var fileChanged = function(e) {
    var file = input.files[0];
    if (file.size > element('MAX_FILE_SIZE').value) {
      submit.disabled = true;
    }
    else {
      submit.disabled = false;
    }
  };

  var fileSubmitted = function(e) {
    e.stopPropagation();
    e.preventDefault();

    var file = input.files[0];

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(e) {
      if (request.readyState === 4) {
        if (request.status === 200) {
          updater.update();
        }
        else {
          console.log("upload failed");
        }
      }
    };

    request.open('POST', form.action, true);
    request.setRequestHeader("Cache-Control", "no-cache");
    request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    request.setRequestHeader("X-File-Name", file.name);
    request.setRequestHeader("X-File-Size", file.size);
    request.setRequestHeader("X-File-Type", file.type);
    request.send(file);
  };

  this.init = function() {
    input.addEventListener('change', fileChanged, false);
    form.addEventListener('submit', fileSubmitted, false);
  };
};
