<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Service | ServicePro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --dark: #2c3e50;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #e9ecef;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background: var(--gradient);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            animation: slideUp 0.6s ease;
        }

        .form-header {
            background: var(--gradient);
            color: white;
            padding: 30px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .form-header i {
            font-size: 3rem;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }

        .form-header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .form-body {
            padding: 40px;
        }

        .form-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
        }

        .form-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 50px;
            right: 50px;
            height: 2px;
            background: var(--border);
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light);
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: var(--gray);
            font-weight: 500;
        }

        .step.active .step-label {
            color: var(--primary);
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .form-group .required {
            color: var(--danger);
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            transition: color 0.3s ease;
        }

        .input-wrapper input,
        .input-wrapper textarea {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .input-wrapper textarea {
            padding-left: 15px;
            min-height: 120px;
            resize: vertical;
        }

        .input-wrapper input:focus,
        .input-wrapper textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .input-wrapper input:focus + i,
        .input-wrapper textarea:focus + i {
            color: var(--primary);
        }

        .help-text {
            color: var(--gray);
            font-size: 0.85rem;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .char-count {
            margin-left: auto;
            font-weight: 600;
        }

        .char-count.warning {
            color: var(--warning);
        }

        .char-count.danger {
            color: var(--danger);
        }

        .price-preview {
            background: var(--light);
            padding: 15px;
            border-radius: 12px;
            margin-top: 10px;
            text-align: center;
            border: 1px solid var(--border);
        }

        .price-preview .label {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .price-preview .amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--success);
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid var(--border);
            gap: 15px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background: var(--success);
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-secondary {
            background: var(--gray);
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Validation states */
        .form-group.error input,
        .form-group.error textarea {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .form-group.success input,
        .form-group.success textarea {
            border-color: var(--success);
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.1);
        }

        .error-message {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .success-message {
            color: var(--success);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s ease;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }

            .form-header,
            .form-body {
                padding: 25px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .form-steps {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .form-steps::before {
                display: none;
            }

            .step {
                flex-direction: row;
                gap: 15px;
            }
        }

        /* Loading state */
        .btn.loading {
            position: relative;
            color: transparent;
        }

        .btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- En-tête du formulaire -->
        <div class="form-header">
            <div class="header-content">
                <i class="fas fa-plus-circle"></i>
                <h1>Nouveau Service</h1>
                <p>Ajoutez un nouveau service à votre catalogue</p>
            </div>
        </div>

        <!-- Étapes de progression -->
        <div class="form-steps">
            <div class="step active">
                <div class="step-number">1</div>
                <div class="step-label">Informations</div>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-label">Détails</div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-label">Confirmation</div>
            </div>
        </div>

        <!-- Corps du formulaire -->
        <div class="form-body">
            <form method="POST" action="/store" id="serviceForm">
                <!-- Titre du service -->
                <div class="form-group" id="titleGroup">
                    <label for="title">
                        Titre du service <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-heading"></i>
                        <input type="text" id="title" name="title" required 
                               placeholder="Ex: Développement Web, Design Graphique..."
                               maxlength="100">
                    </div>
                    <div class="help-text">
                        <i class="fas fa-info-circle"></i>
                        <span>Minimum 3 caractères - Maximum 100 caractères</span>
                        <span class="char-count" id="titleCount">0/100</span>
                    </div>
                    <div class="error-message" id="titleError" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="titleErrorText"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group" id="descriptionGroup">
                    <label for="description">Description</label>
                    <div class="input-wrapper">
                        <textarea id="description" name="description" 
                                  placeholder="Décrivez votre service en détail... (Avantages, fonctionnalités, délais de livraison)"
                                  maxlength="500"></textarea>
                    </div>
                    <div class="help-text">
                        <i class="fas fa-info-circle"></i>
                        <span>Optionnel - Maximum 500 caractères</span>
                        <span class="char-count" id="descriptionCount">0/500</span>
                    </div>
                </div>

                <!-- Prix -->
                <div class="form-group" id="priceGroup">
                    <label for="price">
                        Prix (FCFA) <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-money-bill-wave"></i>
                        <input type="number" id="price" name="price" step="1000" min="0" required 
                               placeholder="Ex: 500000">
                    </div>
                    <div class="help-text">
                        <i class="fas fa-info-circle"></i>
                        <span>Prix en francs CFA - Incréments de 1000 FCFA</span>
                    </div>
                    
                    <!-- Aperçu du prix formaté -->
                    <div class="price-preview" id="pricePreview" style="display: none;">
                        <div class="label">Prix formaté :</div>
                        <div class="amount" id="formattedPrice">0 FCFA</div>
                    </div>
                    
                    <div class="error-message" id="priceError" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="priceErrorText"></span>
                    </div>
                </div>

                <!-- Actions du formulaire -->
                <div class="form-actions">
                    <a href="/" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Retour à la liste
                    </a>
                    <button type="submit" class="btn btn-success" id="submitBtn">
                        <i class="fas fa-save"></i>
                        Enregistrer le service
                    </button>
                </div>
            </form>

            <div class="form-footer">
                <i class="fas fa-shield-alt"></i>
                Toutes vos données sont sécurisées et confidentielles
            </div>
        </div>
    </div>

    <script>
        // Éléments DOM
        const form = document.getElementById('serviceForm');
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        const priceInput = document.getElementById('price');
        const submitBtn = document.getElementById('submitBtn');
        const pricePreview = document.getElementById('pricePreview');
        const formattedPrice = document.getElementById('formattedPrice');

        // Compteurs de caractères
        const titleCount = document.getElementById('titleCount');
        const descriptionCount = document.getElementById('descriptionCount');

        // Groupes et messages d'erreur
        const titleGroup = document.getElementById('titleGroup');
        const titleError = document.getElementById('titleError');
        const titleErrorText = document.getElementById('titleErrorText');
        
        const priceGroup = document.getElementById('priceGroup');
        const priceError = document.getElementById('priceError');
        const priceErrorText = document.getElementById('priceErrorText');

        // Événements
        titleInput.addEventListener('input', updateTitleCount);
        descriptionInput.addEventListener('input', updateDescriptionCount);
        priceInput.addEventListener('input', updatePricePreview);
        form.addEventListener('submit', validateForm);

        // Mise à jour du compteur de titre
        function updateTitleCount() {
            const count = titleInput.value.length;
            titleCount.textContent = `${count}/100`;
            
            if (count > 80) {
                titleCount.classList.add('warning');
            } else {
                titleCount.classList.remove('warning');
            }
            
            validateTitle();
        }

        // Mise à jour du compteur de description
        function updateDescriptionCount() {
            const count = descriptionInput.value.length;
            descriptionCount.textContent = `${count}/500`;
            
            if (count > 400) {
                descriptionCount.classList.add('warning');
            } else if (count > 450) {
                descriptionCount.classList.add('danger');
            } else {
                descriptionCount.classList.remove('warning', 'danger');
            }
        }

        // Aperçu du prix formaté
        function updatePricePreview() {
            const price = parseFloat(priceInput.value) || 0;
            
            if (price > 0) {
                formattedPrice.textContent = new Intl.NumberFormat('fr-FR').format(price) + ' FCFA';
                pricePreview.style.display = 'block';
            } else {
                pricePreview.style.display = 'none';
            }
            
            validatePrice();
        }

        // Validation du titre
        function validateTitle() {
            const value = titleInput.value.trim();
            let isValid = true;
            let message = '';

            if (value.length < 3) {
                isValid = false;
                message = 'Le titre doit contenir au moins 3 caractères';
            } else if (value.length > 100) {
                isValid = false;
                message = 'Le titre ne peut pas dépasser 100 caractères';
            }

            if (!isValid) {
                titleGroup.classList.add('error');
                titleError.style.display = 'flex';
                titleErrorText.textContent = message;
            } else {
                titleGroup.classList.remove('error');
                titleGroup.classList.add('success');
                titleError.style.display = 'none';
            }

            return isValid;
        }

        // Validation du prix
        function validatePrice() {
            const price = parseFloat(priceInput.value);
            let isValid = true;
            let message = '';

            if (!price || price < 0) {
                isValid = false;
                message = 'Le prix doit être un nombre positif';
            } else if (price < 1000) {
                isValid = false;
                message = 'Le prix minimum est de 1 000 FCFA';
            } else if (price > 10000000) {
                isValid = false;
                message = 'Le prix maximum est de 10 000 000 FCFA';
            }

            if (!isValid) {
                priceGroup.classList.add('error');
                priceError.style.display = 'flex';
                priceErrorText.textContent = message;
            } else {
                priceGroup.classList.remove('error');
                priceGroup.classList.add('success');
                priceError.style.display = 'none';
            }

            return isValid;
        }

        // Validation complète du formulaire
        function validateForm(e) {
            e.preventDefault();
            
            const isTitleValid = validateTitle();
            const isPriceValid = validatePrice();
            
            if (isTitleValid && isPriceValid) {
                // Simulation de chargement
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    // Soumission réelle du formulaire
                    form.submit();
                }, 1500);
            } else {
                // Animation de secousse pour les champs invalides
                if (!isTitleValid) {
                    titleGroup.classList.add('shake');
                    setTimeout(() => titleGroup.classList.remove('shake'), 500);
                }
                if (!isPriceValid) {
                    priceGroup.classList.add('shake');
                    setTimeout(() => priceGroup.classList.remove('shake'), 500);
                }
            }
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            updateTitleCount();
            updateDescriptionCount();
            updatePricePreview();
        });

        // Empêcher la soumission avec Enter sur les champs numériques
        priceInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>