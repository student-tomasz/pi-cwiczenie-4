var Uploader = function() {
  var form =   element('upload-form');
  var input =  element('upload-input');
  var submit = element('upload-submit');

  input.reset = function() {
    this.value = null;
  }

  submit.disable = function(message) {
    this.disabled = true;
    if (message) {
      this.value = message;
    }
  }

  submit.enable = function(message) {
    this.disabled = false;
    this.value = message || 'Wyślij';
  }

  var fileChanged = function(e) {
    var file = input.files[0];
    if (!file || file.size > element('MAX_FILE_SIZE').value) {
      submit.disable();
    }
    else {
      submit.enable();
    }
  };

  var fileSubmitted = function(e) {
    e.stopPropagation();
    e.preventDefault();

    var file = input.files[0];
    if (!file) {
      return false;
    }

    submit.disable('Przesyłanie...');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(e) {
      if (request.readyState === 4) {
        if (request.status === 200) {
          updater.update();
          console.log('[notice]', 'file uploaded successfully');
        }
        else {
          console.log('[error]', 'file upload failed');
        }
        submit.enable();
        submit.disable();
        input.reset();
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
    submit.disable();
    input.addEventListener('change', fileChanged, false);
    form.addEventListener('submit', fileSubmitted, false);
  };
};
