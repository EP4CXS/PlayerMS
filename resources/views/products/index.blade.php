<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.05);
            --border-glow: rgba(102, 126, 234, 0.3);
            --text-primary: #ffffff;
            --text-secondary: #a0aec0;
            --accent-cyan: #00d4ff;
            --accent-purple: #667eea;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--dark-bg);
            background-image: 
                radial-gradient(at 0% 0%, rgba(102, 126, 234, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(118, 75, 162, 0.1) 0px, transparent 50%);
            min-height: 100vh;
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(90deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px),
                linear-gradient(rgba(102, 126, 234, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .header-section {
            text-align: center;
            padding: 3rem 0 2rem;
            position: relative;
        }

        .header-title {
            font-size: 3rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 10px rgba(102, 126, 234, 0.5));
            }
            to {
                filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.8));
            }
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .table-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 
                0 8px 32px 0 rgba(0, 0, 0, 0.37),
                inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-glow);
            position: relative;
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .table-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--primary-gradient);
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .table-container:hover::before {
            opacity: 0.1;
        }

        .futuristic-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 0;
        }

        .futuristic-table thead {
            background: var(--primary-gradient);
            position: relative;
        }

        .futuristic-table thead tr {
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .futuristic-table thead th {
            padding: 1.2rem 1.5rem;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.85rem;
            color: var(--text-primary);
            border: none;
            position: relative;
        }

        .futuristic-table thead th:nth-child(2) {
            text-align: left;
        }

        .futuristic-table thead th:first-child {
            border-top-left-radius: 12px;
        }

        .futuristic-table thead th:last-child {
            border-top-right-radius: 12px;
        }

        .futuristic-table tbody tr {
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .futuristic-table tbody tr:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(5px);
            box-shadow: 
                -5px 0 0 0 var(--accent-cyan),
                0 4px 15px rgba(0, 212, 255, 0.2);
        }

        .futuristic-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        .futuristic-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        .futuristic-table tbody td {
            padding: 1.2rem 1.5rem;
            color: var(--text-primary);
            border: none;
            font-size: 1rem;
            text-align: center;
        }

        .futuristic-table tbody td:nth-child(2) {
            text-align: left;
        }

        .futuristic-table tbody td:first-child {
            color: var(--accent-cyan);
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }

        .product-name {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .product-name::before {
            content: '▸';
            color: var(--accent-purple);
            font-size: 1.2rem;
        }

        .product-price {
            font-weight: 600;
            color: var(--accent-cyan);
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
        }

        .product-price::before {
            content: '$';
            margin-right: 2px;
            opacity: 0.7;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
            display: block;
        }

        .empty-state-text {
            font-size: 1.2rem;
            letter-spacing: 1px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2rem;
            }

            .table-container {
                padding: 1rem;
                border-radius: 15px;
            }

            .futuristic-table thead th,
            .futuristic-table tbody td {
                padding: 1rem 0.8rem;
                font-size: 0.9rem;
            }

            .futuristic-table tbody tr:hover {
                transform: translateX(0);
            }
        }

        /* Scrollbar Styling */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-gradient);
        }

        /* Loading Animation */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .icon-wrapper {
            display: inline-block;
            margin-right: 0.5rem;
        }

        .action-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        .btn-create {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.9rem 2rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
            color: var(--text-primary);
        }

        .btn-create:active {
            transform: translateY(0);
        }

        .alert-success {
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.3);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            color: var(--accent-cyan);
            margin-bottom: 1.5rem;
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: center;
        }

        .btn-edit {
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.3);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--accent-cyan);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-edit:hover {
            background: rgba(0, 212, 255, 0.2);
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
        }

        .btn-delete {
            background: rgba(245, 87, 108, 0.1);
            border: 1px solid rgba(245, 87, 108, 0.3);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: #ff6b6b;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-delete:hover {
            background: rgba(245, 87, 108, 0.2);
            border-color: #ff6b6b;
            color: #ff6b6b;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
        }

        @media (max-width: 768px) {
            .action-bar {
                justify-content: center;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }

            .action-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-edit,
            .btn-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="header-section">
        <h1 class="header-title">
            <i class="fas fa-cube icon-wrapper"></i>Players
        </h1>
        <p class="header-subtitle">Player Management System</p>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="action-bar">
        <a href="{{ route('products.create') }}" class="btn-create">
            <i class="fas fa-plus-circle"></i>
            Create New Player
        </a>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="futuristic-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-box"></i> Name</th>
                        <th><i class="fas fa-dollar-sign"></i> Talent Fee</th>
                        <th><i class="fas fa-cog"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                            <td><span class="product-name">{{ $product->name }}</span></td>
                            <td><span class="product-price">{{ number_format($product->price, 2) }}</span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <div class="empty-state-text">No products found in the database.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
