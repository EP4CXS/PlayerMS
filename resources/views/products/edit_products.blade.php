<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
player    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            --input-bg: rgba(255, 255, 255, 0.08);
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

        .form-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 
                0 8px 32px 0 rgba(0, 0, 0, 0.37),
                inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-glow);
            position: relative;
            overflow: hidden;
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container::before {
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

        .form-container:hover::before {
            opacity: 0.1;
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-label i {
            color: var(--accent-cyan);
        }

        .form-control {
            background: var(--input-bg);
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 12px;
            padding: 1rem 1.2rem;
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--accent-cyan);
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.1),
                        0 0 20px rgba(0, 212, 255, 0.2);
            color: var(--text-primary);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-secondary);
            opacity: 0.6;
        }

        .btn-futuristic {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-futuristic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-futuristic:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
        }

        .btn-futuristic:hover::before {
            left: 100%;
        }

        .btn-futuristic:active {
            transform: translateY(0);
        }

        .btn-secondary-futuristic {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1rem 2.5rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-futuristic:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-cyan);
            color: var(--text-primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .alert-futuristic {
            background: rgba(245, 87, 108, 0.1);
            border: 1px solid rgba(245, 87, 108, 0.3);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            color: #ff6b6b;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(5px);
        }

        .alert-futuristic ul {
            margin: 0.5rem 0 0 0;
            padding-left: 1.5rem;
        }

        .alert-futuristic li {
            margin: 0.3rem 0;
        }

        .icon-wrapper {
            display: inline-block;
            margin-right: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .product-id-badge {
            display: inline-block;
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.3);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--accent-cyan);
            font-family: 'Courier New', monospace;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2rem;
            }

            .form-container {
                padding: 2rem 1.5rem;
                border-radius: 15px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-futuristic,
            .btn-secondary-futuristic {
                width: 100%;
                text-align: center;
            }
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

        .form-control:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="header-section">
        <h1 class="header-title">
            <i class="fas fa-edit icon-wrapper"></i>Edit player
        </h1>
        <p class="header-subtitle">Update player Information</p>
    </div>

    <div class="form-container">
        <div class="product-id-badge">
            <i class="fas fa-hashtag"></i> Product ID: {{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}
        </div>

        @if ($errors->any())
            <div class="alert-futuristic">
                <strong><i class="fas fa-exclamation-triangle"></i> Validation Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="form-label">
                    <i class="fas fa-box"></i>
                    Player Name
                </label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $product->name) }}"
                    placeholder="Enter product name..."
                    required
                    autofocus
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="form-label">
                    <i class="fas fa-dollar-sign"></i>
                    Price
                </label>
                <input 
                    type="number" 
                    class="form-control @error('price') is-invalid @enderror" 
                    id="price" 
                    name="price" 
                    value="{{ old('price', $product->price) }}"
                    placeholder="0.00"
                    step="0.01"
                    min="0"
                    required
                >
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn-futuristic">
                    <i class="fas fa-save"></i> Update Product
                </button>
                <a href="{{ route('products.index') }}" class="btn-secondary-futuristic">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
