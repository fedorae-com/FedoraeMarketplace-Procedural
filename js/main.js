//profile
// function triggerClick() {
//   document.querySelector('#profileImage').click();
// }
//
// var loadFile = function(event) {
//   var output = document.getElementById('#profileDisplay');
//   output.src = URL.createObjectURL(event.target.files[0]);
// };

// products
// function imageClick() {
//   document.querySelector('#productImage').click();
// }
//
// var loadFile = function(event) {
//   var output = document.getElementById('#productDisplay');
//   output.src = URL.createObjectURL(event.target.files[0]);
// };



// icon button click all
function toggle(source) {
  checkboxes = document.getElementsByName('chkbox[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
