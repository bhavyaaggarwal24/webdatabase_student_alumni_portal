function alumnivalidateForm() 
{
    var textValue = document.forms["alumniprofileform"]["firstname"].value;
    var textValue2 = document.forms["alumniprofileform"]["lastname"].value;
    var textValue3 = document.forms["alumniprofileform"]["phonenumber"].value;
    var textValue4 = document.forms["alumniprofileform"]["emailid"].value;
    var graduationdate = document.forms["alumniprofileform"]["graduationdate"].value;
    var dob = document.forms["alumniprofileform"]["dob"].value;
    var dob = new Date(dob);
    var graduationdate = new Date(graduationdate);

    var alphanumericRegex = /^[a-zA-Z0-9\s]*$/;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var numericRegex = /^[0-9\s]*$/;
    var customRegex = /^[a-zA-Z\s.]*$/;

    if (textValue.length > 50 || textValue2.length > 50) {
        alert("Name must be less than 50 characters");
        return false
    }

    if (dob > new Date())
    {
        alert("Date of Birth date can not be a future date!");
        return false
    }

    // https://bloomington.iu.edu/about/history.html#:~:text=1820%3A%20A%20legislative%20act%20is,hired%20as%20the%20first%20professor.
    
    if(dob < new Date("1803-01-01"))
    {
        alert("Date of Birth can not be earlier than 01/01/1803!");
        return false
    }
    // https://educationusa.state.gov/experience-studying-usa/us-educational-system/frequently-asked-questions-faqs#:~:text=A%3A%20Colleges%20offer%20only%20undergraduate,least%2017%20years%20of%20age.

    if (dob > new Date(new Date().getFullYear()-17, new Date().getMonth(), new Date().getDate()))
    {
        alert("User must be at least 17 years old!");
        return false
    }

    if (textValue3.length > 10 || textValue3.length < 10) {
        alert("Phone Number must be of 10 digits");
        return false
    }

    if (!numericRegex.test(textValue3)) 
    {
        alert("Phone number must contains digits only!");
        return false
    }

    if (!validRegex.test(textValue4)) {

        alert("Invalid email address!");    
        return false
    
      } 
    if (!customRegex.test(textValue) || !customRegex.test(textValue2))
    {
        alert("Name must contains characters only!");
        return false
    }

    if (graduationdate > new Date())
    {
        alert("Graduation date can not be a future date for an alumni!");
        return false
    }

    if(graduationdate < new Date("1820-01-01"))
    {
        alert("Graduation Date can not be earlier than 01/01/1820!");
        return false
    }
    
}
  
  