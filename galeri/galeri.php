<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <style>
        /* Basic styling */
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
        }
        .gallery-item {
            width: 200px;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            position: relative;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
        }
        .crud-buttons {
            margin-top: 10px;
        }
        .crud-buttons button {
            margin: 2px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .add-button {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Gallery</h1>
    
    <!-- Add button for "Create" operation -->
    <button class="add-button" onclick="alert('Create function not implemented')">Add New Image</button>

    <div class="gallery-container">
        <!-- Sample static gallery items -->
        <div class="gallery-item">
            <img src="https://via.placeholder.com/150" alt="Image 1">
            <p><strong>Description:</strong> Sample description 1</p>
            <p><strong>Upload Date:</strong> 2024-11-01</p>
            <div class="crud-buttons">
                <button onclick="alert('Edit function not implemented')">Edit</button>
                <button onclick="alert('Delete function not implemented')">Delete</button>
            </div>
        </div>
        <div class="gallery-item">
            <img src="https://via.placeholder.com/150" alt="Image 2">
            <p><strong>Description:</strong> Sample description 2</p>
            <p><strong>Upload Date:</strong> 2024-10-31</p>
            <div class="crud-buttons">
                <button onclick="alert('Edit function not implemented')">Edit</button>
                <button onclick="alert('Delete function not implemented')">Delete</button>
            </div>
        </div>
        <div class="gallery-item">
            <img src="https://via.placeholder.com/150" alt="Image 3">
            <p><strong>Description:</strong> Sample description 3</p>
            <p><strong>Upload Date:</strong> 2024-10-30</p>
            <div class="crud-buttons">
                <button onclick="alert('Edit function not implemented')">Edit</button>
                <button onclick="alert('Delete function not implemented')">Delete</button>
            </div>
        </div>
    </div>
</body>
</html>
