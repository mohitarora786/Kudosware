//CONTACT PAGE
function toggleFields() {
    var subject = document.getElementById("subject").value;
    var fileUpload = document.getElementById("file-upload");
    var messageField = document.getElementById("message-field");
  
    if (subject === "career") {
      fileUpload.classList.remove("hide-file-upload");
      messageField.classList.add("hide-message-field");
    } else if (subject === "message") {
      messageField.classList.remove("hide-message-field");
      fileUpload.classList.add("hide-file-upload");
    } else {
      fileUpload.classList.add("hide-file-upload");
      messageField.classList.add("hide-message-field");
    }
  }
  