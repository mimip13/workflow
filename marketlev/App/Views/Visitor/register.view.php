<form action="<?= URL ?>registerValidation" method="POST" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="firstname">Prénom:</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirmez le mot de passe:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <div id="password_errors" class="mb-3">
        <div id="length" class="error-message">Au moins 8 caractères</div>
        <div id="lowercase" class="error-message">Au moins une lettre minuscule</div>
        <div id="uppercase" class="error-message">Au moins une lettre majuscule</div>
        <div id="number" class="error-message">Au moins un chiffre</div>
        <div id="special" class="error-message">Au moins un caractère spécial</div>
    </div>
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary" id="submit_button" disabled>Envoyer</button>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function (){
        const password= document.getElementById("password");
        const confirmPassword = document.getElementById("confirm_password");
        const lengthError=document.getElementById("length");
        const uppercaseError=document.getElementById("uppercase");
        const lowercaseError=document.getElementById("lowercase");
        const numberError=document.getElementById("number");
        const specialError=document.getElementById("special");
        const submitButton=document.getElementById("submit_button");

        function validatePassword(){
            lengthError.style.color = password.value.length >= 8 ? 'green':'red';
            lowercaseError.style.color= /[a-z]/.test(password.value) ? 'green':'red';
            uppercaseError.style.color= /[A-Z]/.test(password.value) ? 'green':'red';
            numberError.style.color= /[0-9]/.test(password.value) ? 'green':'red';
            specialError.style.color= /[\W_]/.test(password.value) ? 'green':'red';

            confirmPassword.style.borderColor= password.value=== confirmPassword.value ? 'green':'red';
            const allGreen=['length','lowercase', 'uppercase', 'number', 'special'].every(
                id => document.getElementById(id).style.color === 'green'
            );
            submitButton.disabled= !allGreen || password.value !== confirmPassword.value;
        }
        password.addEventListener("input", validatePassword);
        confirmPassword.addEventListener("input", validatePassword);
    })
</script>