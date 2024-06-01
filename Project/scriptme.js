function validateForm() 
{
    var textValue = document.forms["studentsignupform"]["firstname"].value;
    var textValue2 = document.forms["studentsignupform"]["lastname"].value;
    var textValue3 = document.forms["studentsignupform"]["phonenumber"].value;
    var textValue4 = document.forms["studentsignupform"]["emailid"].value;
    var textValue5 = document.forms["studentsignupform"]["gpa"].value;

    if (textValue.length > 50 || textValue2.length > 50) {
        alert("Name must be less than 50 characters");
        return false
    }
    if (textValue3.length > 10 || textValue3.length < 10) {
        alert("Phone Number must be of 10 digits");
        return false
    }
    if (textValue5 > 4 || textValue5 < 0)
    {
        alert("Invalid GPA, please enter valid GPA(1 to 4)");
        return false
    }
    var alphanumericRegex = /^[a-zA-Z0-9\s]*$/;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var numericRegex = /^[0-9\s]*$/;
    var customRegex = /^[a-zA-Z\s.]*$/;
    // if(textValue === "" && textValue2 === "" ){
    //    return true
    // }
    // console.log("Hi")
    // console.log(alphanumericRegex.test(textValue2))
    if (!validRegex.test(textValue4)) {

        alert("Invalid email address!");    
        return false
    
      } 
    if (!customRegex.test(textValue) || !customRegex.test(textValue2))
    {
        alert("Name must contains characters only!");
        return false
    }

    if (!numericRegex.test(textValue3)) 
    {
        alert("Phone number must contains digits only!")
        return false
    }

//     else
//     {
//         var stu = true
//     }
//     if (dir === true && stu === true )
//     {
//         return true
//     }
//     else if ( dir === false && stu === true)
//     {
//         alert("Only alphabets are allowed in Director name.")
//         return false
//     }
//     else if ( dir === true && stu === false )
//     {
//         alert("Only alphanumeric values are allowed in Studio name.");
//         return false
//     }
//     else if ( dir === false && stu === false )
//     {
//         alert("Only alphanumeric values are allowed in Studio name and Only alphabets are allowed in Director name.");
//         return false    
//     }
    
}
  
  