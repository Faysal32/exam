document.addEventListener('DOMContentLoaded', function() {
    const countries = ['USA', 'UK', 'Canada', 'Australia', 'Bangladesh', 'India'];
    const countrySelect = document.getElementById('country');
    
    countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country;
        option.textContent = country;
        countrySelect.appendChild(option);
    });
});

function validateForm() {
    let isValid = true;

    
    let username = document.getElementById("uName").value.trim();
    let userMsg = document.getElementById("userMsg");
    if (username === "" || username.length < 6) {
        userMsg.innerHTML = "Username must be at least 6 characters.";
        isValid = false;
    } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
        userMsg.innerHTML = "Username must be alphanumeric.";
        isValid = false;
    } else {
        userMsg.innerHTML = "";
    }

    
    let email = document.getElementById("uEmail").value.trim();
    let emailMsg = document.getElementById("emailMsg");
    if (email === "" || email.length < 8) {
        emailMsg.innerHTML = "Email must be at least 8 characters.";
        isValid = false;
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        emailMsg.innerHTML = "Invalid email format.";
        isValid = false;
    } else {
        emailMsg.innerHTML = "";
    }

    
    let password = document.getElementById("uPass").value;
    let passMsg = document.getElementById("passMsg");
    if (password.length < 8) {
        passMsg.innerHTML = "Password must be at least 8 characters.";
        isValid = false;
    } else {
        passMsg.innerHTML = "";
    }
    
    
    let dob = document.getElementById("uDOB").value;
    let dobMsg = document.getElementById("dobMsg");
    if (!dob) {
        dobMsg.innerHTML = "Please select your date of birth.";
        isValid = false;
    } else {
        dobMsg.innerHTML = "";
    }
    
   
    let country = document.getElementById("country").value;
    let countryMsg = document.getElementById("countryMsg");
    if (!country) {
        countryMsg.innerHTML = "Please select a country.";
        isValid = false;
    } else {
        countryMsg.innerHTML = "";
    }
    
   
    let gender = document.querySelector('input[name="gender"]:checked');
    let genderMsg = document.getElementById("genderMsg");
    if (!gender) {
        genderMsg.innerHTML = "Please select your gender.";
        isValid = false;
    } else {
        genderMsg.innerHTML = "";
    }

    let message = document.getElementById("message").value;
    let uMsg = document.getElementById("uMsg");
    if (message.length < 10) {
        uMsg.innerHTML = "Please share your thoughts in at least 10 characters.";
        isValid = false;
    } else {
        uMsg.innerHTML = "";
    }
    
    
    let termsChecked = document.getElementById("termsCheck").checked;
    let termsMsg = document.getElementById("termsMsg");
    if (!termsChecked) {
        termsMsg.innerHTML = "You must accept the terms and conditions.";
        isValid = false;
    } else {
        termsMsg.innerHTML = "";
    }

    if (isValid) {
    alert("Form submitted successfully!");
    location.reload();
}
else{
    return false; 
}

}
