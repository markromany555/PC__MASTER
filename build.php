<?php
include 'includes/db_connection.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Build Your PC | PC Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./font-awesome-web/css/all.min.css">
    <style>
        body { background-color: #0b0c10; color: white; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow-x: hidden; }
        .component-card { background: #1f2833; border: 1px solid #45a29e; border-radius: 12px; transition: 0.3s; margin-bottom: 15px; }
        .component-card:hover { border-color: #66fcf1; box-shadow: 0 0 10px rgba(102, 252, 241, 0.2); }
        .price-sticky { position: sticky; top: 20px; background: #1f2833; border: 2px solid #66fcf1; border-radius: 15px; z-index: 100; }
        .btn-select { background-color: #66fcf1; color: #0b0c10; font-weight: bold; border: none; transition: 0.2s; }
        .btn-select:hover { background-color: #45a29e; transform: translateY(-2px); }
        .text-info-custom { color: #66fcf1 !important; }
        .disabled-row { opacity: 0.4; pointer-events: none; filter: grayscale(1); }
        
        @media (max-width: 991.98px) {
            .price-sticky { position: relative; top: 0; margin-bottom: 25px; border-width: 1px; }
            .component-card { flex-direction: column; text-align: center; padding: 20px !important; }
            .component-card .d-flex { flex-direction: column; align-items: center; }
            .component-card i { margin-right: 0 !important; margin-bottom: 15px; font-size: 2.5rem; }
            .btn-select { width: 100%; mt-3; }
        }
    </style>
</head>
<body>

<div class="container-fluid container-lg py-4 py-md-5">
    <div class="row g-4">
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <h2 class="mb-4 text-info-custom text-center text-lg-start fs-3 fs-md-2">
                Custom PC Builder <i class="fas fa-tools ms-2"></i>
            </h2>
            
            <div id="builder-steps">
                <div class="component-card p-3 d-flex justify-content-between align-items-center" id="row-cat-1">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-microchip fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Processor (CPU)</h5>
                            <small id="cpu-display" class="text-secondary">Select a CPU to start</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(1)">+ Select</button>
                </div>

                <div class="component-card p-3 d-flex justify-content-between align-items-center disabled-row" id="row-cat-2">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-id-card fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Motherboard</h5>
                            <small id="mobo-display" class="text-secondary">Choose Your MotherBoard</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(2)">+ Select</button>
                </div>

                <div class="component-card p-3 d-flex justify-content-between align-items-center" id="row-cat-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-video fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Graphics Card (GPU)</h5>
                            <small id="gpu-display" class="text-secondary">Choose your power</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(3)">+ Select</button>
                </div>

                <div class="component-card p-3 d-flex justify-content-between align-items-center" id="row-cat-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-memory fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Memory (RAM)</h5>
                            <small id="ram-display" class="text-secondary">Select capacity</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(4)">+ Select</button>
                </div>

                <div class="component-card p-3 d-flex justify-content-between align-items-center" id="row-cat-5">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-hdd fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Storage (SSD/HDD)</h5>
                            <small id="storage-display" class="text-secondary">Select storage</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(5)">+ Select</button>
                </div>

                <div class="component-card p-3 d-flex justify-content-between align-items-center" id="row-cat-6">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-bolt fa-2x me-3 text-info-custom"></i>
                        <div>
                            <h5 class="mb-1 fs-6 fs-md-5">Power Supply (PSU)</h5>
                            <small id="psu-display" class="text-secondary">Select PSU</small>
                        </div>
                    </div>
                    <button class="btn btn-select btn-sm px-4 mt-3 mt-md-0" onclick="openPicker(6)">+ Select</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="price-sticky p-4 shadow-lg">
                <h4 class="text-info-custom d-flex justify-content-between align-items-center">
                    Build Summary <i class="fas fa-list-ul fs-6"></i>
                </h4>
                <hr class="bg-info">
                <div id="summary-content" style="max-height: 300px; overflow-y: auto;">
                    <ul class="list-unstyled mb-0" id="summary-list">
                        <li class="text-muted small italic">No components selected yet.</li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between mt-4 border-top border-secondary pt-3">
                    <h5 class="fw-bold">Total Cost:</h5>
                    <h5 class="text-info-custom fw-bold">$<span id="total-price">0.00</span></h5>
                </div>
                <button class="btn btn-select w-100 mt-3 py-2 fs-5" onclick="checkout()">
                    Finalize Build <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pickerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content bg-dark border-info">
            <div class="modal-header border-secondary p-3">
                <h5 class="modal-title text-info-custom fs-5">Available Components</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0" id="modal-content" style="min-height: 200px;">
                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

<script>
let config = { 1: null, 2: null, 3: null, 4: null, 5: null, 6: null, 7: null };
const catNames = { 1: 'CPU', 2: 'Motherboard', 3: 'GPU', 4: 'RAM', 5: 'Storage', 6: 'PSU', 7: 'Case' };

function openPicker(catId) {
    const content = document.getElementById('modal-content');
    content.innerHTML = '<div class="text-center p-5"><div class="spinner-border text-info"></div><p class="mt-2 text-muted">Scanning inventory...</p></div>';
    
    let socketParam = (catId == 2 && config[1]) ? `&socket=${encodeURIComponent(config[1].socket)}` : '';
    
    fetch(`get_products.php?cat_id=${catId}${socketParam}`)
        .then(response => response.text())
        .then(data => {
            content.innerHTML = data;
            const modalElement = document.getElementById('pickerModal');
            bootstrap.Modal.getOrCreateInstance(modalElement).show();
        })
        .catch(err => {
            content.innerHTML = '<div class="alert alert-danger m-3">Connection error. Please try again.</div>';
        });
}

function selectItem(id, name, price, socket, catId) {
    config[catId] = { id, name, price, socket };

    const displayIds = { 1: 'cpu', 2: 'mobo', 3: 'gpu', 4: 'ram', 5: 'storage', 6: 'psu' };
    const label = document.getElementById(displayIds[catId] + '-display');
    if(label) {
        label.innerHTML = `<span class="text-info-custom fw-bold">${name}</span> <span class="ms-2 text-success">$${price}</span>`;
    }

    if(catId == 1) {
        document.getElementById('row-cat-2').classList.remove('disabled-row');
        document.getElementById('mobo-display').innerHTML = `Socket: <span class="text-warning">${socket}</span> (Ready)`;
    }

    updateSummary();
    bootstrap.Modal.getInstance(document.getElementById('pickerModal')).hide();
}

function updateSummary() {
    let total = 0;
    let listHtml = "";
    let hasItems = false;

    for (let key in config) {
        if (config[key]) {
            hasItems = true;
            total += parseFloat(config[key].price);
            listHtml += `
                <li class="mb-3 d-flex justify-content-between align-items-start border-bottom border-secondary pb-2">
                    <div style="max-width: 70%">
                        <span class="text-info-custom x-small d-block fw-bold" style="font-size: 0.7rem;">${catNames[key].toUpperCase()}</span>
                        <div class="text-white small">${config[key].name}</div>
                    </div>
                    <span class="text-success small fw-bold">$${config[key].price}</span>
                </li>`;
        }
    }
    document.getElementById('total-price').innerText = total.toLocaleString(undefined, {minimumFractionDigits: 2});
    document.getElementById('summary-list').innerHTML = hasItems ? listHtml : '<li class="text-muted small">No parts selected</li>';
}

function checkout() {
    if (!config[1] || !config[2]) {
        alert("Action Required: Please select both a CPU and a Motherboard to continue.");
        return;
    }
    const total = document.getElementById('total-price').innerText.replace(/,/g, '');
    window.location.href = `checkout.php?cpu=${config[1].id}&mobo=${config[2].id}&total=${total}`;
}
</script>

</body>
</html>