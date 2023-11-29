<form action="/submit-payment" method="post">
    @csrf <!-- Add this if you are using Laravel for CSRF protection -->
    <h2>Payment Form</h2>

    <h3>2000<h3>
 
    <label for="referenceNumber">Reference Number</label>
    <input type="text" id="referenceNumber" name="referenceNumber" required>

    <button type="submit">Submit</button>
</form>