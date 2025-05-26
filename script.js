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

    let firstName = document.getElementById("fullname").value.trim();
    let firstNameMsg = document.getElementById("firstNameMsg");
    if (!firstName) {
        firstNameMsg.innerHTML = "Please enter your first name.";
        isValid = false;
    } else if (firstName.length < 2) {
        firstNameMsg.innerHTML = "First name must be at least 2 characters.";
        isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(firstName)) {
        firstNameMsg.innerHTML = "First name must contain only letters.";
        isValid = false;
    } else {
        firstNameMsg.innerHTML = "";
    }

    
    let username = document.getElementById("uName").value.trim();
    let userMsg = document.getElementById("userMsg");
    if (!username) {
        userMsg.innerHTML = "Please enter a username.";
        isValid = false;
    }
    else if (username === "" || username.length < 6) {
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
    if (!email) {
        emailMsg.innerHTML = "Please enter an email address.";
        isValid = false;
    }
    else if (email === "" || email.length < 8) {
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
    if(!password){
        passMsg.innerHTML = "Please enter a password.";
        isValid = false;
    }
    else if (password.length < 8) {
        passMsg.innerHTML = "Password must be at least 8 characters.";
        isValid = false;
    } 
    else {
        passMsg.innerHTML = "";
    }
    
    let confirmPassword = document.getElementById("uConfirmPass").value;
    let confirmPassMsg = document.getElementById("confirmPassMsg");

    if (!confirmPassword) {
        confirmPassMsg.innerHTML = "Please confirm your password.";
        isValid = false;
    }

    else if (password !== confirmPassword) {
        confirmPassMsg.innerHTML = "Please input correct password.";
        isValid = false;
    } 
    else {
    confirmPassMsg.innerHTML = "";
    } 
    
    let dob = document.getElementById("uDOB").value;
    let dobMsg = document.getElementById("dobMsg");
    if (!dob) {
        dobMsg.innerHTML = "Please select your date of birth.";
        isValid = false;
    }
    else {
        // Get today's date
        const today = new Date();
        const birthDate = new Date(dob);
        const age = today.getFullYear() - birthDate.getFullYear();
        const month = today.getMonth();
        const day = today.getDate();

        // Adjust age if the birthday hasn't occurred yet this year
        if (month < birthDate.getMonth() || (month === birthDate.getMonth() && day < birthDate.getDate())) {
            age--;
        }

        // Check if the user is at least 18 years old
        if (age < 18) {
            dobMsg.innerHTML = "Please enter a valid date of birth. You must be at least 18 years old.";
            isValid = false;
        }
        else {
        dobMsg.innerHTML = "";
        }
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
        return true;
    }
    else {
        alert("Please correct the errors in the form.");
        return false;
    }

}
