<div id="login">
    <form action="login.php" id="login-form" method="post" autocomplete="off">
    <div id="form-title">
        Connexion
    </div>
    <?php
    if (isset($logoutMsg)) {
        echo '<div>'.$logoutMsg.'</div>';
    }
    ?>
    <div class="field">
        <label 
        class="field-label"
        for="field-username"
        >
        Identifiant
        </label>
        <input
        class="field-input"
        id="field-username"
        name="username"
        type="text"
        placeholder="Identifiant"
        />
        <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
    </div>
    <div class="field">
        <label 
        class="field-label"
        for="field-password"
        >
        Mot de passe
        </label>
        <input
        class="field-input"
        id="field-password"
        name="password"
        type="password"
        placeholder="Mot de passe"
        />
        <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
    </div>
    <div id="errors"><?php
    foreach($errors as $errorMsg) {
        echo '<p>'.$errorMsg.'</p>';
    }
    ?></div>
    <button id="login-submit">Connexion</button>
    </form>
</div>