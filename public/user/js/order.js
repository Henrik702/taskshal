var orderData = {
    choosedBoxes: [],
    type: '',
    total_price: '',
    pickup_total_price: '',
    pickupDate: {
        date: '',
        time: '',
    },
    sender: {
        name: '',
        phone: '',
        email: '',
        address: '',
        city: '',
        state: '',
        zip_code: '',
        notes: ''
    },
    recipient: {
        name: '',
        phone: '',
        email: '',
        address: '',
        city: '',
        state: '',
        zip_code: '',
        notes: ''
    },
    destination: '',
    pickup_price: '',
    destination_price: '',
    agree: false
}
var step = 0;
$(document).ready(function () {
    boxSizeChoose();
    typeSelect();
    pickupDate();
    sender();
    recipient();
    destination();

    nextStep();

    $('[data-toggle="datepicker"]').datepicker();
})

function boxSizeChoose() {
    var boxSizeChoose = document.querySelector('.box-size-choose');
    if (boxSizeChoose) {

        var total = 0;
        var choosedBoxes = document.querySelector('.choosed-boxes');

        boxSizeChoose.querySelector('select').addEventListener('change', function () {
            var price = this.querySelectorAll('option')[this.selectedIndex].dataset.price;
            var id = this.querySelectorAll('option')[this.selectedIndex].dataset.id;
            boxSizeChoose
                .querySelector('.add-box').setAttribute('data-price', price);
            boxSizeChoose
                .querySelector('.add-box').setAttribute('data-id', id);
        })

        boxSizeChoose
            .querySelector('.add-box')
            .addEventListener('click', function (event) {
                event.preventDefault();
                var select = boxSizeChoose.querySelector('select');


                var choosen = select?.value;
                var id = this.dataset.id;
                var price = +this.dataset.price;
                total += price;
                if (choosen !== '') {
                    orderData.total_price = total;
                    orderData.choosedBoxes.unshift({name: choosen, price, id,});
                    select.value = ''
                    choosedBoxes.innerHTML = '';
                    orderData.choosedBoxes.map(function (box, i) {
                        choosedBoxes.innerHTML += '<div class="_item" >' +
                            '<span>' + box.name + '</span>' +
                            '<img src="user/images/icons/bin.svg" ' +
                            'alt="" ' +
                            'class="remove" ' +
                            'data-index="' + i + '" ' +
                            'data-price="' + box.price + '">' +
                            '</div><input type="hidden" value="' + box.id + '" name="box[]">';
                        if (orderData.choosedBoxes.length) {
                            $('.next-step').removeAttr('disabled');
                        }
                        document.querySelector('.total .price').innerHTML = total
                        $('._item .remove').on('click', removeItem)
                    })
                }
            })

        function removeItem() {
            var index = this.dataset.index;
            orderData.choosedBoxes = orderData.choosedBoxes.filter(function (item, i) {
                return i !== +index
            })
            choosedBoxes.innerHTML = '';
            total -= Number(this.dataset.price);
            orderData.choosedBoxes.map(function (box, i) {
                choosedBoxes.innerHTML += '<div class="_item" >' +
                    '<span>' + box.name + '</span>' +
                    '<img src="user/images/icons/bin.svg" ' +
                    'alt="" ' +
                    'class="remove" ' +
                    'data-index="' + i + '" ' +
                    'data-price="' + box.price + '">' +
                    '</div>'
            })
            if (orderData.choosedBoxes.length) {
                $('.next-step').removeAttr('disabled');
            } else {
                $('.next-step').attr('disabled', true);
            }
            document.querySelector('.total .price').innerHTML = total
            $('._item .remove').on('click', removeItem)
        }
    }
}

function typeSelect() {
    $('[name=type]').on('change', function () {
        orderData.type = this.value;


        if(this.value == 'pickup'){
            var total = Number(orderData.total_price) + Number($('.pickup_price').val());
            orderData.pickup_total_price = total;
            document.querySelector('.total .price').innerHTML = orderData.pickup_total_price;
        }else{
            orderData.pickup_total_price = orderData.total_price;
            document.querySelector('.total .price').innerHTML = orderData.total_price;
        }
        $('.step2 label').removeClass('active');
        $(this).closest('label').addClass('active');
    })
}

function pickupDate() {
    $('#pickup-date').on('change', function () {
        orderData.pickupDate.date = this.value
        if (
            orderData.pickupDate.date.trim() !== '' &&
            orderData.pickupDate.time.trim() !== ''
        ) {
            $('.next-step').removeAttr('disabled')
        } else {
            $('.next-step').attr('disabled', true);
        }
    })
    $('#pickup-time').on('change', function () {
        orderData.pickupDate.time = this.value;
        if (
            orderData.pickupDate.date.trim() !== '' &&
            orderData.pickupDate.time.trim() !== ''
        ) {
            $('.next-step').removeAttr('disabled')
        } else {
            $('.next-step').attr('disabled', true);
        }
    })
}
function sender() {
    function changeHandler(e) {
        var name = orderData.sender['name'] = $(this).closest('.form').find('.name').val().trim();
        var phone = orderData.sender['phone'] = $(this).closest('.form').find('.phone').val().trim();
        var email = orderData.sender['email'] = $(this).closest('.form').find('.email').val().trim();
        var address = orderData.sender['address'] = $(this).closest('.form').find('.address').val().trim();
        var city = orderData.sender['city'] = $(this).closest('.form').find('.city').val().trim();
        var state = orderData.sender['state'] = $(this).closest('.form').find('.state').val().trim();
        var zip_code = orderData.sender['zip_code'] = $(this).closest('.form').find('.zip_code').val().trim();

        if (
            name !== '' &&
            phone !== '' &&
            email !== '' &&
            address !== '' &&
            city !== '' &&
            state !== '' &&
            zip_code !== ''

    ) {
            $('.next-step').removeAttr('disabled')
        } else {
            $('.next-step').attr('disabled', true);
        }
    }

    $('.step4 input').on('change', changeHandler)
    $('.step4 select').on('change', changeHandler)
    $('.step4 textarea').on('change', changeHandler)
}

function recipient() {
    function changeHandler(e) {
        orderData.recipient[e.target.name] = e.target.value.trim();
        var recipient = orderData.recipient
        if (
            recipient.name.trim() !== '' &&
            recipient.phone.trim() !== '' &&
            recipient.email.trim() !== '' &&
            recipient.address.trim() !== '' &&
            recipient.city.trim() !== '' &&
            recipient.state.trim() !== '' &&
            recipient.zip_code.trim() !== ''
        ) {
            $('.next-step').removeAttr('disabled')
        } else {
            $('.next-step').attr('disabled', true);
        }
    }

    $('.step5 input').on('change', changeHandler)
    $('.step5 select').on('change', changeHandler)
    $('.step5 textarea').on('change', changeHandler)
}

function destination() {
    $('.step6 input').on('change', function (e) {
        orderData.agree = e.target.checked
        orderData.destination = $('.step6 input:checked').val();
        if($('.step6 input:checked').val() == 'address'){
            $('.delivery_price').val();
            if(orderData.pickup_total_price){
                var total = Number(orderData.pickup_total_price) + Number($('.delivery_price').val());

            }else{
                var total = Number(orderData.total_price) + Number($('.delivery_price').val());
            }
            document.querySelector('.total .price').innerHTML = total;
        }else{
            if(orderData.pickup_total_price){
                var total = Number(orderData.pickup_total_price);

            }else{
                var total = Number(orderData.total_price);
            }
            document.querySelector('.total .price').innerHTML = total;

        }
        if (orderData.agree && $('#terms').is(':checked')) {
            $('.next-step').removeAttr('disabled')
        } else {
            $('.next-step').attr('disabled', true);
        }
    })
}

function nextStep() {
    $('.next-step').on('click', function (event) {
        event.preventDefault();
        var next = true;
        switch (step + 1) {
            case 1:
                if (!orderData.choosedBoxes.length) {
                    next = false
                } else {
                    orderData.type = 'pickup';
                    var total = Number(orderData.total_price) + Number($('.pickup_price').val());
                    orderData.pickup_total_price = total;
                    document.querySelector('.total .price').innerHTML = total;
                }
                break;
            case 3:
                if (orderData.pickupDate.date.trim() === '' || orderData.pickupDate.time.trim() === '')
                    next = false
                break;
            case 4:
                var sender = orderData.sender
                if (
                    sender.name.trim() === '' ||
                    sender.phone.trim() === '' ||
                    sender.email.trim() === '' ||
                    sender.address.trim() === '' ||
                    sender.city.trim() === '' ||
                    sender.state.trim() === '' ||
                    sender.zip_code.trim() === ''
                )
                    next = false;
                break;
            case 5:
                var recipient = orderData.recipient
                if (
                    recipient.name.trim() === '' ||
                    recipient.phone.trim() === '' ||
                    recipient.email.trim() === '' ||
                    recipient.address.trim() === '' ||
                    recipient.city.trim() === '' ||
                    recipient.state.trim() === '' ||
                    recipient.zip_code.trim() === ''
                )
                    next = false;
                else
                    orderData.destination = 'yerevan';
                break;
        }
        if (next) {
            step++;
            if(step===5){
                this.innerHTML = 'Order';
            }
            if (step === 6) {
                sendOrder(orderData);
            } else {
                var nextStep = step + 1;
                if (step === 2 && orderData.type === 'delivery') {

                    $('.steps li')
                        .removeClass('active')
                        .eq(step).addClass('active');
                    $('.step' + step).hide();
                    step++;
                    nextStep = step + 1;
                    $('.step' + nextStep).fadeIn(300);
                }else{
                    $('.steps li')
                        .removeClass('active')
                        .eq(step).addClass('active');
                    $('.step' + step).hide();
                    $('.step' + nextStep).fadeIn(300);
                }

                if (step !== 1)
                    $(this).attr('disabled', true)


            }
        }

    })
}

$('.send').on('click', function (event) {
        sendOrder(orderData);
});

function sendOrder(orderData){
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    $.ajax({
        url: "/new/order",
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'pickup_price': $('.pickup_price').val(),
            'delivery_price': $('.delivery_price').val()
        },
        data: {
           orderData
        }
    }).done(function(id) {
        window.location.href = '/order/success/'+id;
    });
}
