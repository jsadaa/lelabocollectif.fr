var checkbox = document.querySelector("input[name=checkbox]");

checkbox.addEventListener('change', function() {
  if (this.checked) {
    document.getElementById('password').setAttribute('type','text');
  } else {
    document.getElementById('password').setAttribute('type','password');
  }
});