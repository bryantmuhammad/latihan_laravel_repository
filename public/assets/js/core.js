const baseUrl = window.location.origin;
const buttonDelete = document.querySelector(".delete");
if (buttonDelete) {
    buttonDelete.addEventListener("click", function (e) {
        e.preventDefault();
        Swal.fire({
            icon: "warning",
            title: "Yakin ingin menghapus data?",
            showConfirmButton: true,
            confirmButtonText: "Ya Hapus",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                this.parentElement.submit();
            }
        });
    });
}

const productCard = document.querySelectorAll(".product-list");

if (productCard) {
    productCard.forEach((card) => {
        card.addEventListener("click", async function (e) {
            const element = e.target;

            let productId = getProductId(element);
            const productInTable = document.getElementById(`prod-${productId}`);
            // Cek apakah produk sudah ada didalam table
            if (!productInTable) {
                await fetch(`${baseUrl}/product/${productId}`)
                    .then((Response) => Response.json())
                    .then((Response) => {
                        drawTable(Response);
                        setTotal();
                    });
            }
        });
    });
}

function drawTable(product) {
    const { id, product_name, product_photo, product_price, product_stok } =
        product;
    const tr = document.createElement("tr");
    const tdHapus = document.createElement("td");
    const tdNamaProduk = document.createElement("td");
    const tdQty = document.createElement("td");
    const tdTotal = document.createElement("td");
    const inputQty = drawInput({
        type: "number",
        max: product_stok,
        value: 1,
        name: `product[${id}]`,
    });
    tr.setAttribute("id", `prod-${id}`);
    const btnHapus = document.createElement("button");
    btnHapus.append(document.createTextNode("x"));
    btnHapus.classList.add("btn", "btn-primary-outline");
    tdHapus.appendChild(btnHapus);
    tdNamaProduk.appendChild(document.createTextNode(product_name));
    tdQty.appendChild(inputQty);
    tdTotal.appendChild(
        document.createTextNode(product_price.toLocaleString("id-ID"))
    );
    tdTotal.dataset.price = product_price;

    tr.appendChild(tdHapus);
    tr.appendChild(tdNamaProduk);
    tr.appendChild(tdQty);
    tr.appendChild(tdTotal);

    const tbody = document.getElementById("tableproduk");
    tbody.appendChild(tr);
}

function drawInput(attributs) {
    let input = document.createElement("INPUT");
    input.classList.add("form-control");

    for (const attribut in attributs) {
        input.setAttribute(attribut, attributs[attribut]);
    }

    return input;
}

function setTotal() {
    const table = document.getElementById("tableproduk").children;
    let total = 0;
    [...table].forEach((tr) => {
        total += parseFloat(tr.lastChild.dataset.price);
    });

    document.getElementById("total").innerHTML =
        "Rp " + total.toLocaleString("id-ID");
}

function getProductId(element, number) {
    if (element.classList.contains("product-list")) return element.dataset.id;
    return getProductId(element.parentElement);
}
