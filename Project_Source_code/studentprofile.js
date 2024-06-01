function validateForm() 
{

var textValue1 = document.forms["studentprofileform"]["firstname"].value;
var textValue21 = document.forms["studentprofileform"]["lastname"].value;
var textValue31 = document.forms["studentprofileform"]["phonenumber"].value;
var textValue41 = document.forms["studentprofileform"]["emailid"].value;
var textValue51 = document.forms["studentprofileform"]["gpa"].value;
var enrollmentdate1 = document.forms["studentprofileform"]["enrollmentdate"].value;
var expectedgraduationdate1 = document.forms["studentprofileform"]["expectedgraduationdate"].value;
var dob1 = document.forms["studentprofileform"]["dob"].value;
var enrollmentdate1 = new Date(enrollmentdate1);
var expectedgraduationdate1 = new Date(expectedgraduationdate1);
var dob1 = new Date(dob1);

var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var numericRegex = /^[0-9\s]*$/;
var gpanumericRegex = /^[0-9\s.]*$/;
var customRegex = /^[a-zA-Z\s.]*$/;

if (textValue1.length > 50 || textValue21.length > 50) {
    alert("Name must be less than 50 characters");
    return false
}
if (textValue31.length > 10 || textValue31.length < 10) {
    alert("Phone Number must be of 10 digits");
    return false
}
if (dob1 > new Date())
{
    alert("Date of Birth date can not be a future date!");
    return false
}

if(dob1 < new Date("1803-01-01"))
{
    alert("Date of Birth can not be earlier than 01/01/1803!");
    return false
}

if (dob1 > new Date(new Date().getFullYear()-17, new Date().getMonth(), new Date().getDate()))
{
    alert("Student must be at least 17 years old!");
    return false
}

if (!validRegex.test(textValue41)) {

    alert("Invalid email address!");    
    return false

  } 
if (!customRegex.test(textValue1) || !customRegex.test(textValue21))
{
    alert("Name must contains characters only!");
    return false
}

if (!numericRegex.test(textValue31)) 
{
    alert("Phone number must contains digits only!")
    return false
}
console.log(enrollmentdate1);
if (enrollmentdate1 > new Date())
{
    alert("Enrollment date can not be a future date!");
    return false
}

if (expectedgraduationdate1 < new Date())
{
    alert("Expected graduation date can not be in past for a student!");
    return false
}

if (textValue51 > 4 || textValue51 < 0)
{
    alert("Invalid GPA, please enter valid GPA(1 to 4)");
    return false
}

if (!gpanumericRegex.test(textValue51)) 
{
    alert("GPA must contains digits only!")
    return false
}

}

