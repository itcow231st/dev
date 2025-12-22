// setup CSRF cho toàn bộ ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * ADD TO CART
 */
$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();

    const btn = $(this);
    const url = btn.data('url');
    btn.prop('disabled', true);

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            product_id: btn.data('product-id'),
            qty: btn.data('qty') || 1
        },
        success(res) {
            if (res.status) {
                updateCartCount(res.cart_count);
                if (res.cart_html) {
                    $('.cart-wrapper').replaceWith(
                        $(res.cart_html).find('.cart-wrapper'));
                }
            }
        },
        complete() {
            btn.prop('disabled', false);
        }
    });
});


/**
 * UPDATE CART COUNT (header)
*/
function updateCartCount(count) {
    $('.cart-count').text(count);
    $('.cart-header').text(`Giỏ hàng (${count})`);
}
function updateCartTotal(total) {
    $('.cart-total').text(total);
}
/**
 * UPDATE QTY (+ / -)
 */
$(document).on('click', '.qty-btn', function () {
    const btn = $(this);
    const productId = btn.data('id');
    const action = btn.data('action');

    const qtyEl = $('#qty-' + productId);
    let qty = parseInt(qtyEl.text());

    qty = action === 'plus' ? qty + 1 : qty - 1;

    $.post('/cart/update-qty', {
        product_id: productId,
        qty: qty
    }, function (res) {
        if (res.status) {
            qtyEl.text(Math.max(qty, 0));
            updateCartCount(res.cart_count);
        }
    });
});

$(document).on('click', '.remove-cart-item', function (e) {
    e.preventDefault();

    const btn = $(this);
    const item = btn.closest('.cart-item');
    const tableRow = $('tr[data-id="' + btn.data('id') + '"]');
    const dropdownItem = $('.cart-item[data-id="' + btn.data('id') + '"]');

    $.ajax({
        url: '/cart/remove',
        method: 'POST',
        data: {
            product_id: btn.data('id'),
        },
        success(res) {
            if (res.status) {
                // 1️⃣ Xoá dòng sản phẩm NGAY LẬP TỨC
                dropdownItem.fadeOut(200, function () {
                    $(this).remove();
                });

                // Xoá trong trang giỏ hàng
                tableRow.fadeOut(200, function () {
                    $(this).remove();
                });
                // 2️⃣ Update số lượng
                updateCartCount(res.cart_count);

                updateCartTotal(number_format(res.cart_total) + 'đ');

                // 3️⃣ Nếu giỏ hàng trống
                if (res.cart_count === 0) {
                    $('.cart-items').html(
                        '<li class="empty-cart">Giỏ hàng trống</li>'
                    );

                    $('tbody').html(`<tr><td colspan="6" class="text-center py-4">Giỏ hàng trống</td></tr>`);
                }
            }
        }
    });
});

function number_format(number) {
    number = Number(number) || 0;
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

