function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }


// $(document).ready(function(){
//     // Get value on button click and show alert
//     $("#myBtn").click(function(){
//         var email = $("#email").val();
//         var pass = $("#password").val();
//         if (email == '' || pass == ''){
//             // alert("برجاء إدخال بريد صحيح");
//             swal({
//               title: "برجاء إدخال بريد صحيح",
//               icon: "warning",
//               button: " !أوافق"
//             });
//         }else{
//           swal({
//             title: "تم بنجاح ",
//             icon: "success",
//             button: " !أوافق"
//           });
//         }
        
//     });
//     $("#myBtn1").click(function(){
//         var name = $("#name").val();
//         var email = $("#email1").val();
//         var phone = $("#phone").val();
//         var pass = $("#password1").val();
//         if (email == '' || pass == '' || name =='' || phone == ''){
//             // alert("برجاء إدخال بريد صحيح");
//             swal({
//               title: "لا بد من الموافقة على الشروط والقوانين",
//               icon: "warning",
//               button: " !أوافق"
//             });
//         }else{
//           swal({
//             title: "تم بنجاح ",
//             icon: "success",
//             button: " !أوافق"
//           });
//         }
        
//     });
    // $(".myBtn2").click(function(){
        
    //       swal({
    //         title: "يجب التسجيل  ",
    //         icon: "warning",
    //         button: " !أوافق"
    //       });
    //     });
      
    
    
// });
$(function(){

  $('input[type="number"]').niceNumber();

});

// function increaseValue() {
//   var value = parseInt(document.getElementById('number').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value++;
//   document.getElementById('number').value = value;
// }

// function decreaseValue() {
//   var value = parseInt(document.getElementById('number').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value < 1 ? value = 1 : '';
//   value--;
//   document.getElementById('number').value = value;
// }


// function increaseeValue() {
//   var value = parseInt(document.getElementById('number1').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value++;
//   document.getElementById('number1').value = value;
// }
// function decreaseeValue() {
//   var value = parseInt(document.getElementById('number1').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value < 1 ? value = 1 : '';
//   value--;
//   document.getElementById('number1').value = value;
// }

// function increase2Value() {
//   var value = parseInt(document.getElementById('number2').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value++;
//   document.getElementById('number2').value = value;
// }
// function decrease2Value() {
//   var value = parseInt(document.getElementById('number2').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value < 1 ? value = 1 : '';
//   value--;
//   document.getElementById('number2').value = value;
// }
// function increase3Value() {
//   var value = parseInt(document.getElementById('number3').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value++;
//   document.getElementById('number3').value = value;
// }
// function decrease3Value() {
//   var value = parseInt(document.getElementById('number3').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value < 1 ? value = 1 : '';
//   value--;
//   document.getElementById('number3').value = value;
// }