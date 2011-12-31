(function() {
  var uploader = {
    form:   element('upload-form'),
    input:  element('upload-input'),
    submit: element('upload-submit')
  };

  var fileChanged = function(e) {
    var file = uploader.input.files[0];
    if (file.size > element('MAX_FILE_SIZE').value) {
      uploader.submit.disabled = true;
    }
    else {
      uploader.submit.disabled = false;
    }
  };

  var fileSubmitted = function(e) {
    e.stopPropagation();
    e.preventDefault();

    var file = uploader.input.files[0];

    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      xhr.open('POST', uploader.form.action, true);
      xhr.setRequestHeader("Cache-Control", "no-cache");
      xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      xhr.setRequestHeader("X-File-Name", file.name);
      xhr.setRequestHeader("X-File-Size", file.size);
      xhr.setRequestHeader("X-File-Type", file.type);
      xhr.send(file);
    }
  };

  uploader.form.addEventListener('change', fileChanged, false);
  uploader.form.addEventListener('submit', fileSubmitted, false);
})();
