let error_message_email_login;
let error_message_password_login;
let error_message_fname;
let error_message_lname;
let error_message_age;
let error_message_wilaya;
let error_message_phone;
let error_message_email_inscription;
let error_message_address;
let error_message_password_inscription;
let error_message_confirme_password;
let error_message_match;

function Validation_login(event) {
  let input_email = document.getElementById("input-email");
  let input_password = document.getElementById("input-password");
  let email = document.getElementById("email");
  let password = document.getElementById("password");
  if (input_email.value == "" || input_password.value == "") {
    event.preventDefault();
    if (!error_message_email_login && input_email.value == "") {
      error_message_email_login = document.createElement("p");
      error_message_email_login.textContent = "please , fill the email !!";
      error_message_email_login.style = "color:red;";
      email.appendChild(error_message_email_login);
    }
    if (!error_message_password_login && input_password.value == "") {
      error_message_password_login = document.createElement("p");
      error_message_password_login.textContent =
        "please , fill the password !!";
      error_message_password_login.style = "color:red;";
      password.appendChild(error_message_password_login);
    }
  }
  if (input_email.value != "" && error_message_email_login) {
    error_message_email_login.remove();
    error_message_email_login = null;
  }

  if (input_password.value != "" && error_message_password_login) {
    error_message_password_login.remove();
    error_message_password_login = null;
  }
}

function validation_inscription(event) {
  let input_fname = document.getElementById("input-fname").value;
  let input_lname = document.getElementById("input-lname").value;
  let input_age = document.getElementById("input-age").value;
  let input_wilaya = document.getElementById("input-wilaya").value;
  let input_phone = document.getElementById("input-phone").value;
  let input_email = document.getElementById("input-email").value;
  let input_address = document.getElementById("input-address").value;
  let input_password = document.getElementById("input-password").value;
  let input_confirme_password = document.getElementById(
    "input-confirme-password",
  ).value;
  let input_gender = document.querySelector(
    'input[name="gender"]:checked',
  ).value;

  let first_name = document.getElementById("first-name");
  let last_name = document.getElementById("last-name");
  let age = document.getElementById("age");
  let wilaya = document.getElementById("wilaya");
  let phone = document.getElementById("phone");
  let email = document.getElementById("email");
  let address = document.getElementById("address");
  let password = document.getElementById("password");
  let confirme_password = document.getElementById("confirme-password");
  let pass_confirme_pass = document.getElementById("pass-confirme-pass");

  if (
    input_fname == "" ||
    input_lname == "" ||
    input_age == "" ||
    input_wilaya == "" ||
    input_phone == "" ||
    input_email == "" ||
    input_address == "" ||
    input_password == "" ||
    input_confirme_password == ""
  ) {
    event.preventDefault();
    if (input_fname == "" && !error_message_fname) {
      error_message_fname = document.createElement("p");
      error_message_fname.style = "color:red;";
      error_message_fname.textContent = "please , fill the First Name !!";
      first_name.appendChild(error_message_fname);
    }
    if (input_lname == "" && !error_message_lname) {
      error_message_lname = document.createElement("p");
      error_message_lname.style = "color:red;";
      error_message_lname.textContent = "please , fill the Last Name !!";
      last_name.appendChild(error_message_lname);
    }
    if (input_email == "" && !error_message_email_inscription) {
      error_message_email_inscription = document.createElement("p");
      error_message_email_inscription.style = "color:red;";
      error_message_email_inscription.textContent =
        "please , fill the E-mail !!";
      email.appendChild(error_message_email_inscription);
    }
    if (input_address == "" && !error_message_address) {
      error_message_address = document.createElement("p");
      error_message_address.style = "color:red;";
      error_message_address.textContent = "please , fill the Address !!";
      address.appendChild(error_message_address);
    }
    if (
      (input_age == "" || input_age < 17 || input_age > 100) &&
      !error_message_age
    ) {
      error_message_age = document.createElement("p");
      error_message_age.style = "color:red;";
      error_message_age.textContent =
        "please , fill the Age between 17 and 100 !!";
      age.appendChild(error_message_age);
    }
    if (
      (input_phone == "" ||
        (input_phone.length != 9 && input_phone.length != 10)) &&
      !error_message_phone
    ) {
      error_message_phone = document.createElement("p");
      error_message_phone.style = "color:red;";
      error_message_phone.textContent =
        "please , fill the phone with 9 or 10 digits !!";
      phone.appendChild(error_message_phone);
    }
    if (
      (input_password == "" || input_password.length < 8) &&
      !error_message_password_inscription
    ) {
      error_message_password_inscription = document.createElement("p");
      error_message_password_inscription.style = "color:red;";
      error_message_password_inscription.textContent =
        "please , fill the Password contain at least 8 characters!!";
      password.appendChild(error_message_password_inscription);
    }
    if (
      (input_confirme_password == "" || input_confirme_password.length < 8) &&
      !error_message_confirme_password
    ) {
      error_message_confirme_password = document.createElement("p");
      error_message_confirme_password.style = "color:red;";
      error_message_confirme_password.textContent =
        "please , fill the Confirmation Password that contain at least 8 characters!!";
      confirme_password.appendChild(error_message_confirme_password);
    }
    if (input_password != input_confirme_password && !error_message_match) {
      error_message_match = document.createElement("p");
      error_message_match.style =
        "color:red;width:100%;text-align:center;padding:20px;";
      error_message_match.textContent =
        "the password and it's confirmation are not match !!";
      pass_confirme_pass.appendChild(error_message_match);
    }
    if (input_wilaya == "" && !error_message_wilaya) {
      error_message_wilaya = document.createElement("p");
      error_message_wilaya.style = "color:red;";
      error_message_wilaya.textContent = "please , fill the Wilaya !!";
      wilaya.appendChild(error_message_wilaya);
    }
  }
  if (input_wilaya != "" && error_message_wilaya) {
    error_message_wilaya.remove();
    error_message_wilaya = null;
  }
  if (input_password == input_confirme_password && error_message_match) {
    error_message_match.remove();
    error_message_match = null;
  }
  if (input_confirme_password.length >= 8 && error_message_confirme_password) {
    error_message_confirme_password.remove();
    error_message_confirme_password = null;
  }
  if (input_password.length >= 8 && error_message_password_inscription) {
    error_message_password_inscription.remove();
    error_message_password_inscription = null;
  }
  if (
    (input_phone.length == 9 || input_phone.length == 10) &&
    error_message_phone
  ) {
    error_message_phone.remove();
    error_message_phone = null;
  }
  if (input_age <= 100 && input_age >= 17 && error_message_age) {
    error_message_age.remove();
    error_message_age = null;
  }
  if (input_email != "" && error_message_email_inscription) {
    error_message_email_inscription.remove();
    error_message_email_inscription = null;
  }
  if (input_fname != "" && error_message_fname) {
    error_message_fname.remove();
    error_message_fname = null;
  }
  if (input_lname != "" && error_message_lname) {
    error_message_lname.remove();
    error_message_lname = null;
  }
  if (input_address != "" && error_message_address) {
    error_message_address.remove();
    error_message_address = null;
  }
  if (
    !error_message_fname &&
    !error_message_lname &&
    !error_message_age &&
    !error_message_wilaya &&
    !error_message_phone &&
    !error_message_email_inscription &&
    !error_message_address &&
    !error_message_password_inscription &&
    !error_message_confirme_password &&
    !error_message_match
  ) {
    alert(
      `✔ Account Created Successfully! Welcome ${input_fname}\nSelected Wilaya: ${input_wilaya}\nGender: ${input_gender}`,
    );
  }
}

function validation_order(event) {
  let quantityElement = document.getElementById("Qant_prod");
  let selectedQuantity = quantityElement.value;
  let checkedColorInput = document.querySelector(
    'input[name="Colr_prod"]:checked',
  );
  let selectedColor = checkedColorInput
    ? checkedColorInput.value
    : "Not Specified";
  let isConfirmed = confirm(
    `Order Details:\n- Color: ${selectedColor}\n- Quantity: ${selectedQuantity}\n\nDo you want to confirm this order?`,
  );
  if (!isConfirmed) {
    event.preventDefault();
    return false;
  }

  return true;
}
