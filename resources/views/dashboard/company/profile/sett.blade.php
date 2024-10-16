<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 grid grid-cols-12">
        <!-- General Information Section -->
        <div class="col-span-8">

            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">General Information</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Product Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" value="Xiaomi Watch 2 Pro">
                </div>
                <div>
                    <label class="block text-gray-700">Description</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" rows="4">Xiaomi Watch 2 Pro supports 19 professional fitness modes such as for basketball, tennis, swimming, and HIIT...</textarea>
                </div>
            </div>
    
            
    
            <!-- Pricing Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">Pricing</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700">Base Price</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" value="$118.89">
                    </div>
                    <div>
                        <label class="block text-gray-700">Discount Percentage (%)</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" value="25%">
                    </div>
                    <div>
                        <label class="block text-gray-700">Discount Type</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1">
                            <option>Select a discount type</option>
                        </select>
                    </div>
                </div>
            </div>
    
            
    
            <!-- Inventory Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">Inventory</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700">SKU</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" value="113902">
                    </div>
                    <div>
                        <label class="block text-gray-700">Barcode</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" value="0924289012">
                    </div>
                    <div>
                        <label class="block text-gray-700">Quantity</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" placeholder="Quantity">
                    </div>
                </div>
            </div>
    
            <!-- Variation Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Variation</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Variation Type</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" placeholder="Variation Type">
                    </div>
                    <div>
                        <label class="block text-gray-700">SKU Variation</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1" placeholder="SKU Variation">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-4">
            <!-- Product Media Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">Product Media</h2>
                <div class="flex items-center space-x-4">
                    <div class="w-24 h-24 bg-gray-200 flex items-center justify-center rounded-lg">100 x 100</div>
                    <div class="w-24 h-24 bg-gray-200 flex items-center justify-center rounded-lg">100 x 100</div>
                    <div class="w-24 h-24 bg-gray-200 flex items-center justify-center rounded-lg">100 x 100</div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add More Image</button>
                </div>
            </div>

            <!-- Category Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">Category</h2>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-gray-700">Product Category</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1">
                            <option>Electronics</option>
                        </select>
                    </div>
                    <div class="relative">
                        <label class="block text-gray-700">Product Tags</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1">
                            <option>Internet Of Things</option>
                        </select>
                    </div>
                    <div>
                        <button class=" bg-blue-500 text-white px-4 py-2 rounded-lg">Select Tags</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
