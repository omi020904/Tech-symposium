function validateForm() {
    const nameField = document.getElementById("name").value;
    const namePattern = /^[A-Za-z\s]+$/;
    if (!namePattern.test(nameField)) {
        alert("Name must not contain any numbers.");
        return false;
    }

    const mobileField = document.getElementById("mobileno").value;
    const mobilePattern = /^\d{10}$/;
    if (!mobilePattern.test(mobileField)) {
        alert("Mobile number must be exactly 10 digits.");
        return false;
    }

    return true;
}

function redirectToGooglePay() {
    const amount = 1.00; // Replace with the actual amount
    const upiID = "omi3630kamble45@okicici"; // Replace with your actual UPI ID
    const name = document.getElementById("name").value;
    const paymentLink = `upi://pay?pa=${upiID}&pn=${name}&tn=Registration Payment&am=${amount}&cu=INR`;

    window.location.href = paymentLink;
}
