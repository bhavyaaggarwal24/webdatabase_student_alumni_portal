function validateForm() 
{
    var textValue = document.forms["studentsignupform"]["firstname"].value;
    var textValue2 = document.forms["studentsignupform"]["lastname"].value;
    var textValue3 = document.forms["studentsignupform"]["phonenumber"].value;
    var textValue4 = document.forms["studentsignupform"]["emailid"].value;
    var textValue5 = document.forms["studentsignupform"]["gpa"].value;
    var enrollmentdate = document.forms["studentsignupform"]["enrollmentdate"].value;
    var expectedgraduationdate = document.forms["studentsignupform"]["expectedgraduationdate"].value;
    var dob = document.forms["studentsignupform"]["dob"].value;
    var enrollmentdate = new Date(enrollmentdate);
    var expectedgraduationdate = new Date(expectedgraduationdate);
    var dob = new Date(dob);

    if (textValue.length > 50 || textValue2.length > 50) {
        alert("Name must be less than 50 characters");
        return false
    }

    if(dob > new Date())
    {
        alert("Date of Birth can not be a future date!");
        return false
    }

    if(dob < new Date("1803-01-01"))
    {
        alert("Date of Birth can not be earlier than 01/01/1803!");
        return false
    }

    if (dob > new Date(new Date().getFullYear()-17, new Date().getMonth(), new Date().getDate()))
    {
        alert("Student must be at least 17 years old!");
        return false
    }

    var alphanumericRegex = /^[a-zA-Z0-9\s]*$/;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var numericRegex = /^[0-9\s]*$/;
    var gpanumericRegex = /^[0-9\s.]*$/;
    var customRegex = /^[a-zA-Z\s.]*$/;

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

    if (textValue3.length > 10 || textValue3.length < 10) {
        alert("Phone Number must be of 10 digits");
        return false
    }

    if (enrollmentdate > new Date())
    {
        alert("Enrollment date can not be a future date!");
        return false
    }

    if (expectedgraduationdate < new Date())
    {
        alert("Expected graduation date can not be in past for a student!");
        return false
    }

    if (textValue5 > 4 || textValue5 < 0)
    {
        alert("Invalid GPA, please enter valid GPA(1 to 4)");
        return false
    }

    if (!gpanumericRegex.test(textValue5)) 
    {
        alert("GPA must contains digits only!")
        return false
    }
    
}

