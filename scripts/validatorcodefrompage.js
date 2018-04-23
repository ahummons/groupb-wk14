    var frmvalidator  = new Validator("3Dprintingappt");
    frmvalidator.addValidation("name","req","Please provide your name"); 
    frmvalidator.addValidation("visitor_email","req","Please provide your email"); 
    frmvalidator.addValidation("visitor_email","email","Please enter a valid email address"); 
