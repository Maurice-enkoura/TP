<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestion des Services</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 2.5rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
        }

        .stats {
            display: flex;
            gap: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 25px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .main-content {
            padding: 40px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background: var(--success);
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-warning {
            background: var(--warning);
        }

        .btn-warning:hover {
            background: #e67e22;
        }

        .btn-danger {
            background: var(--danger);
        }

        .btn-danger:hover {
            background: #c0392b;
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

        .flash-message {
            background: var(--success);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.5s ease;
            box-shadow: var(--shadow);
        }

        .flash-message.error {
            background: var(--danger);
        }

        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: var(--light);
        }

        th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--border);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            transition: background 0.3s ease;
        }

        tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .service-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .service-description {
            color: var(--gray);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .price {
            font-weight: 700;
            color: var(--success);
            font-size: 1.1rem;
        }

        .date {
            color: var(--gray);
            font-size: 0.85rem;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: #d4f8e8;
            color: var(--success);
        }

        .badge-warning {
            background: #fef5e6;
            color: var(--warning);
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .actions .btn {
            padding: 8px 16px;
            font-size: 0.85rem;
        }

        .empty-state {
            text-align: center;
            padding: 60px 40px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .empty-state p {
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: var(--light);
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 15px;
        }

        .total-services {
            font-weight: 600;
            color: var(--dark);
        }

        .pagination {
            display: flex;
            gap: 8px;
        }

        .pagination-btn {
            padding: 8px 16px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination-btn:hover:not(.active) {
            background: var(--light);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .stats {
                justify-content: center;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .actions {
                flex-direction: column;
            }

            table {
                display: block;
                overflow-x: auto;
            }

            .footer {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Loading animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <!-- Header avec statistiques -->
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-concierge-bell"></i>
                    <div>
                        <h1>Service</h1>
                        <p>Gestion de services</p>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number"><?= count($services) ?></span>
                        <span class="stat-label">Services</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?= array_sum(array_column($services, 'price')) > 0 ? number_format(array_sum(array_column($services, 'price')) / 1000, 0, '', ' ') : '0' ?>K</span>
                        <span class="stat-label">Chiffre d'affaires</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?= count(array_unique(array_column($services, 'title'))) ?></span>
                        <span class="stat-label">Catégories</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="main-content">
            <!-- Messages flash -->
            <?php if (isset($_SESSION['flash_message'])): ?>
                <div class="flash-message">
                    <i class="fas fa-check-circle"></i>
                    <?= htmlspecialchars($_SESSION['flash_message']) ?>
                </div>
                <?php unset($_SESSION['flash_message']); ?>
            <?php endif; ?>

            <!-- Barre d'outils -->
            <div class="toolbar">
                <h2 class="page-title"> Liste des Services</h2>
                <div class="toolbar-actions">
                    <a href="/create" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Nouveau Service
                    </a>
                    <button class="btn btn-outline" onclick="exportData()">
                        <i class="fas fa-download"></i>
                        Exporter
                    </button>
                </div>
            </div>

            <!-- Tableau des services -->
            <?php if (empty($services)): ?>
                <div class="empty-state">
                    <i class="fas fa-clipboard-list"></i>
                    <h3>Aucun service enregistré</h3>
                    <p>Commencez par ajouter votre premier service à votre catalogue.</p>
                    <a href="/create" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Créer mon premier service
                    </a>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($services as $service): ?>
                            <tr class="fade-in">
                                <td>
                                    <div class="service-title"><?= htmlspecialchars($service->title) ?></div>
                                    <div class="text-muted">#<?= htmlspecialchars($service->id) ?></div>
                                </td>
                                <td>
                                    <div class="service-description">
                                        <?= htmlspecialchars($service->description) ?: '<span style="color: #999">Aucune description</span>' ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="price"><?= number_format($service->price, 0, '', ' ') ?> FCFA</div>
                                </td>
                                <td>
                                    <span class="badge badge-success">Actif</span>
                                </td>
                                <td>
                                    <div class="date"><?= date('d/m/Y', strtotime($service->created_at)) ?></div>
                                    <div class="text-muted"><?= date('H:i', strtotime($service->created_at)) ?></div>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="/edit/<?= $service->id ?>" class="btn btn-warning" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/delete/<?= $service->id ?>" class="btn btn-danger" 
                                           onclick="return confirmDelete('<?= htmlspecialchars($service->title) ?>')"
                                           title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pied de page avec pagination -->
                <div class="footer">
                    <div class="total-services">
                        <?= count($services) ?> service<?= count($services) > 1 ? 's' : '' ?> au total
                    </div>
                    <div class="pagination">
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <button class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <script>
        // Confirmation de suppression améliorée
        function confirmDelete(serviceName) {
            return confirm(`Êtes-vous sûr de vouloir supprimer le service "${serviceName}" ? Cette action est irréversible.`);
        }

        // Animation de chargement
        function setLoading(state) {
            document.body.classList.toggle('loading', state);
        }

        // Export des données (fonction simulée)
        function exportData() {
            setLoading(true);
            setTimeout(() => {
                alert('Fonction d\'export à implémenter !');
                setLoading(false);
            }, 1000);
        }

        // Auto-dissimulation des messages flash
        setTimeout(() => {
            const flashMessage = document.querySelector('.flash-message');
            if (flashMessage) {
                flashMessage.style.transition = 'all 0.5s ease';
                flashMessage.style.opacity = '0';
                flashMessage.style.transform = 'translateY(-20px)';
                setTimeout(() => flashMessage.remove(), 500);
            }
        }, 5000);

        // Animation au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.6s ease forwards';
                }
            });
        }, observerOptions);

        // Observer les lignes du tableau
        document.querySelectorAll('tbody tr').forEach(row => {
            observer.observe(row);
        });

        // Tooltips simples
        document.querySelectorAll('[title]').forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = e.target.getAttribute('title');
                tooltip.style.cssText = `
                    position: absolute;
                    background: var(--dark);
                    color: white;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 0.8rem;
                    z-index: 1000;
                    transform: translateY(-100%);
                `;
                document.body.appendChild(tooltip);
                
                const rect = e.target.getBoundingClientRect();
                tooltip.style.left = rect.left + 'px';
                tooltip.style.top = rect.top - 5 + 'px';
                
                e.target._tooltip = tooltip;
            });
            
            element.addEventListener('mouseleave', (e) => {
                if (e.target._tooltip) {
                    e.target._tooltip.remove();
                }
            });
        });
    </script>
</body>
</html>