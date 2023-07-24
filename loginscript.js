/*function auth(){
  var email = document.getElementById("email").value;
  var password = document.getElementById("pass").value;
  if(email== "karanjakimani245@gmail.com" && password== "123456"){
      window.location.assign("home.php ");
      alert("login Success");
  }
  else{
      alert("invalid login details");
      return;
  }
}
*/
const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnlogin-popup');
const iconClose = document.querySelector('.icon-close');
const submit = document.querySelector('.btn');


registerlink.addEventListener('click', () => {
  wrapper.classList.add('active');
});

loginlink.addEventListener('click', () => {
  wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () => {
  wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', () => {
  wrapper.classList.remove('active-popup');
});

// Add an event listener to handle sign-out button click
const budgetItems = document.querySelectorAll(".budget-item");
signOutButton.addEventListener("click", () => {
  window.location.href = "login.html";
});
    // BUDGETS PAGE//
const signOutButton = document.getElementById("sign-out-btn");
// Add event listeners to handle budget item click
budgetItems.forEach((budgetItem) => {
  const details = budgetItem.querySelector(".details");
  budgetItem.addEventListener("click", () => {
      details.classList.toggle("open");
  });
});


document.addEventListener('DOMContentLoaded', function() {
  var requisitionForm = document.getElementById('requisition-form');
  requisitionForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission

      // Retrieve form data
      var requesterName = document.getElementById('requester-name').value;
      var productDetails = document.getElementById('product-details').value;
      var quantity = document.getElementById('quantity').value;
      var price = document.getElementById('price').value;
      var deliveryDate = document.getElementById('delivery-date').value;
      var department = document.getElementById('department').value;
      var additionalInfo = document.getElementById('additional-info').value;

      // Generate a unique requisition number
      var requisitionNumber = generateRequisitionNumber();

      // Perform data validation and sanitization

      // Save the requisition data to the database (to be implemented later)

      // Redirect the user or perform any other necessary actions
      console.log('Requisition submitted successfully.');
  });

  // Function to generate a unique requisition number
  function generateRequisitionNumber() {
      // Generate a unique number based on your requirements
      // You can use a combination of date, time, and a random number for simplicity
      var timestamp = Date.now();
      var randomNumber = Math.floor(Math.random() * 9000) + 1000;
      var requisitionNumber = 'REQ' + timestamp + randomNumber;
      return requisitionNumber;
  }
});
