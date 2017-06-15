
function validateForm() {
    if (document.forms["myForm"]["name"].value == "")
    {
        alert("Name must be filled out");
        return false;
    }
    if (document.forms["myForm"]["email"].value == "")
    {
        alert("Email must be filled out");
        return false;
    }
    if (document.forms["myForm"]["website"].value == "")
    {
        alert("Website must be filled out");
        return false;
    }
    if (document.forms["myForm"]["comment"].value == "")
    {
        alert("Comment must be filled out");
        return false;
    }
        if (document.forms["myForm"]["gender"].value == "")
    {
        alert("Gender must be filled out");
        return false;
    }





}
