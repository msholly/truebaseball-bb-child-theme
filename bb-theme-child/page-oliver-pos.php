<?php
/* Template Name: POS Template */
?>

<?php acf_form_head(); ?>
<?php get_header(); ?>

<div id="oliver-pos">
    <div id="content" role="main" style="height: 100vh">

        <?php /* The loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="oliver-msg" class="alert alert-dismissible fade show nomargin" role="alert">
                            <strong class="status">Holy guacamole!</strong>
                            <span class="msg">You should check in on some of those fields below.</span>
                            <button type="button" class="close" data-hide="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <!-- <div class="col-3"> -->
                    <!-- <button id="refreshPage" class="btn btn-dark btn-block btn-lg noradius">Ready</button> -->
                    <!-- <button id="custom_tax_add_button" class="btn btn-success btn-block btn-lg noradius button-secondary">Recalc Tax</button> -->
                    <!-- <button id="custom_fee_remove_button" class="btn btn-danger btn-block btn-lg noradius">Delete Tax</button> -->
                    <!-- <button id="clearAllTags" class="btn btn-block btn-lg noradius color--primary-bg color--white">Clear Tags</button> -->
                    <!-- </div> -->
                </div>

                <?php acf_form(); ?>

                <div class="row">
                    <div class="col-12">
                        <?php $true_pos_nonce = wp_create_nonce('true_pos_form_nonce'); ?>

                        <input type="hidden" id="true_pos_nonce" name="true_pos_nonce" value="<?php echo $true_pos_nonce ?>" />

                        <!-- Image loader -->
                        <div id='loader' style='display: none;'>
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/ball-loading.gif" />
                        </div>
                        <!-- Image loader -->
                    </div>
                </div>

                <div class="row ticket-data">
                    <div class="col-6">
                        <h3 id="event-title" class="merge"></h3>
                        <div id="event-date" class="merge"></div>
                    </div>
                    <div class="col-6">
                        <h3>Player Name</h3>
                        <div id="player-name" class="merge"></div>
                    </div>
                </div>

                <div class="row ticket-data">
                    <div class="col-3">
                        <h3>Attendee ID</h3>
                        <div id="ticket-num" class="merge"></div>
                    </div>
                    <div class="col-3">
                        <h3>TICKET TYPE</h3>
                        <div id="ticket-type" class="merge"></div>
                    </div>
                    <div class="col-3">
                        <h3>PURCHASER</h3>
                        <span id="ticket-purchaser" class="merge"></span> for $<span id="ticket-cost" class="merge"></span>
                    </div>
                    <div class="col-3">
                        <h3>SECURITY</h3>
                        <div id="ticket-security" class="merge"></div>
                    </div>
                </div>

                <div class="row ticket-data">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            <h3 class="nomargin">TICKET <strong>#<span id="ticket-id" class="merge"></span></strong> STATUS from ORDER #<span id="ticket-orderid" class="merge"></span></h3>
                            <div id="ticket-checkin" class="merge"></div>
                        </div>
                    </div>
                </div>

                <div class="row address-data">
                    <div class="col-12">
                        <h3>Ship To Address - Status: <span id="addr-source">From store</span></h3>
                        <div class="original-ship">
                            <div class="merge">
                                <span id="ship-route"></span>
                                <span id="ship-addr2"></span>
                            </div>
                            <div id="ship-rest" class="merge"></div>
                            <button id="showShipToOverride" class="btn btn-outline-info btn-block btn-lg noradius">Ship to new address</button>
                        </div>

                        <div class="auto-complete">

                            <input id="geocomplete-true" type="text" placeholder="Search for an address" autocomplete="new-password">
                            <!-- <input id="find" type="button" value="find" /> -->


                            <div class="row">
                                <div class="col-3">
                                    <label>Street Number </label>
                                    <input id="street_number" name="street_number" type="text" value="" required>
                                </div>
                                <div class="col-6">
                                    <label>Street </label>
                                    <input id="route" name="route" type="text" value="" required>
                                </div>
                                <div class="col-3">
                                    <label>Apt, Suite</label>
                                    <input id="subpremise" name="subpremise" type="text" value="">
                                </div>
                                <div class="col-4">
                                    <label>City</label>
                                    <input id="locality" name="locality" type="text" value="" required>
                                </div>
                                <div class="col-2">
                                    <label>State</label>
                                    <input id="administrative_area_level_1_short" name="administrative_area_level_1_short" type="text" value="" maxlength="2" required>
                                </div>
                                <div class="col-3">
                                    <label>Postal Code</label>
                                    <input id="postal_code" name="postal_code" type="text" value="" maxlength="5" required>
                                </div>
                                <div class="col-3">
                                    <label>Country</label>
                                    <input id="country_short" name="country_short" type="text" value="" maxlength="2" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button id="saveNewShipTo" class="btn btn-dark btn-block btn-lg noradius">Save Address And Calc Taxes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 map-wrapper">
                        <h3>Map</h3>
                        <div class="map_canvas"></div>
                    </div>
                </div>

                <div class="fixed-bottom">
                    <table class="table">
                        <tr>
                            <td>
                                <h3 class="nomargin text-center">STEP 1</h3>
                                <button id="customtags_button" class="button button-primary button-large" style="display: block;width: 100%;">Save To POS Order</button>
                            </td>
                            <td>
                                <h3 class="nomargin text-center">STEP 2</h3>
                                <button id="extension_finished" class="button button-secondary button-large" style="display: block;width: 100%;">Complete Tags</button>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php the_content(); ?>

            </div>

        <?php endwhile; ?>

        <script>
            "use strict";

            var checkoutData, oliverTaxResponse, oliverProductTaxes;
            var oliverExtensionTargetOrigin = '<?php echo OLIVER_EXTENSION_TARGET_ORIGIN; ?>';

            // URL Params for initial data
            // https://truediamondscience.com//oliver-pos/?userEmail%3Dcontact%40mitchellsholly.com%26location%3DTRUE%20Diamond%20Science%26register%3DRegister%20One%20-%20MS%20Dev%26total%3D410
            var urlParams = new URLSearchParams(decodeURIComponent(window.location.search));

            var oliverEmail = urlParams.get("userEmail");
            var oliverLocation = urlParams.get("location");
            var oliverRegister = urlParams.get("register");
            var oliverPOSdata = {
                salesRep: oliverEmail,
                location: oliverLocation,
                register: oliverRegister
            };
            // console.log("EMAIL FROM PARAMS")
            // console.log(oliverEmail)

            // console.log("Location FROM PARAMS")
            // console.log(oliverLocation)

            // console.log("Register FROM PARAMS")
            // console.log(oliverRegister)

            (function($) {

                var acf_orderType = ".acf-field-5d25148656536";
                var acf_salesRep = ".acf-field-5d25156b56537";
                var acf_affiliate = ".acf-field-5d251671a38b3";
                var acf_ticket = ".acf-field-5d4a0a0c75c12";

                jQuery(document).ready(function($) {


                    if ($("body").hasClass("page-template-page-oliver-pos-php")) {

                        initPage();

                        initGeo();

                        // Get Order Info
                        var $eventSelect = $(acf_ticket + " select");

                        $eventSelect.select2();
                        $eventSelect.on("select2:select", function(e) {
                            var thisTicket = $(acf_ticket + " select").select2('data');
                            let true_pos_nonce = document.getElementById("true_pos_nonce").value;

                            if (thisTicket[0].id) {
                                var r = /([0-9]+) .*? /;
                                var ticketOrderID = thisTicket[0].text.match(r)[1];
                            }
                            var data = {
                                action: 'get_ticket_info',
                                true_pos_nonce: true_pos_nonce,
                                ticketOrderID: ticketOrderID,
                                ticketID: thisTicket[0].id
                            }
                            console.log(data)
                            $.ajax({
                                url: truefunction.ajax_url,
                                type: 'get',
                                data: data,
                                contentType: "application/json; charset=utf-8",
                                dataType: "json",
                                beforeSend: function() {
                                    // Show image container
                                    $("#loader").show();
                                    $(".ticket-data").hide();
                                    $("#customtags_button").addClass('disabled');
                                },
                                success: function(response) {
                                    setTicketUI(response)
                                },
                                error: (error) => {
                                    showAlert(error.responseText, "danger", error.statusText)
                                    console.log(JSON.stringify(error));
                                },
                                complete: function(data) {
                                    // Hide image container
                                    $("#loader").hide();
                                }
                            });

                            return false;
                        });

                        $eventSelect.on("select2:unselect", function(e) {
                            $(".ticket-data").hide();
                            $(".merge").empty();
                            $("#customtags_button").removeClass('disabled');
                        });
                    }

                    // EXTENSION HELPERS 
                    // $("#refreshPage").on("click", refreshPage);
                    $("#showShipToOverride").on("click", showShipToOverride);
                    $("#saveNewShipTo").on("click", saveNewShipTo);

                    // $("#custom_tax_add_button").on("click", resetOliverTaxes);

                });

                window.addEventListener('load', (event) => {
                    console.log("LOAD EVENT LISTENER")
                    postExtensionReady();
                    // invoke the payment toggle function
                    postTogglePaymentButton();

                    if (window.location.hostname === "true-diamond-science.local") {
                        calculateOliverTaxes();
                    }
                });

                function saveNewShipTo() {
                    if ($(this).hasClass("disabled")) {
                        //bail since something is missing or wrong
                        return
                    }
                    var checkedAddress = checkCheckoutData(getShipToOverride());
                    console.log("RECALC FOR NEW ADDR")
                    console.log(checkedAddress)
                    if (checkedAddress.valid) {
                        resetOliverTaxes();
                    }

                }

                function showShipToOverride() {
                    console.log("Function showShipToOverride")
                    $(".original-ship").hide();
                    $(".auto-complete").show();
                    $("#customtags_button").addClass('disabled');
                    $("#addr-source").text("custom");
                }

                function setTicketUI(response) {
                    console.log(response)
                    if (response.event_meta === null) {
                        // EVENT WAS DELETED
                        showAlert("Error getting event information.", "danger", "Error")
                        return
                    }
                    $(".ticket-data").show();
                    $("#event-title").text(response.event_meta.post_title);
                    $("#event-date").text(response.event_date);

                    $("#ticket-orderid").text(response.ticketOrderID);
                    $("#ticket-id").text(response.attendee_info[0].attendee_id);

                    $("#ticket-num").text(response.attendee_info[0].attendee_id);
                    $("#ticket-type").text(response.attendee_info[0].ticket_name);
                    $("#ticket-purchaser").text(response.attendee_info[0].holder_name);
                    $("#ticket-cost").text(response.attendee_metadata._paid_price[0]);
                    $("#ticket-security").text(response.attendee_info[0].security_code);

                    // IF GOOD ORDER STATUS
                    if (response.ticketOrderStatus === 'completed' || response.ticketOrderStatus === 'processing') {

                        if (response.attendee_info[0].check_in === '') {
                            $("#ticket-checkin").text('Unused. You can apply this ticket to this order.').parent().addClass("alert-success").removeClass("alert-danger");
                            $("#customtags_button").removeClass('disabled');

                        } else if (response.attendee_info[0].check_in === '1') {
                            $("#ticket-checkin").text('USED. DO NOT APPLY to this order.').parent().addClass("alert-danger").removeClass("alert-success");
                        } else {
                            $("#ticket-checkin").text(response.attendee_info[0].check_in); // FALLBACK
                        }

                    } else {
                        // ELSE IF BAD ORDER STATUS
                        $("#ticket-checkin").text('ORDER ' + response.ticketOrderStatus + '. DO NOT APPLY to this order.').parent().addClass("alert-danger").removeClass("alert-success");

                    }


                    $("#player-name").text(response.attendee_info[0].attendee_meta['players-name'].value);
                }

                $('body').on('click', '.clearAllTags', function() {
                    clearAllTags();
                });

                function clearAllTags() {
                    initCookies();
                    $(".savedTag").remove();
                    $(".acf-input").show();
                    $(acf_orderType + " select, " + acf_salesRep + " select, " + acf_affiliate + " select, " + acf_ticket + " select").show().val("").trigger('change');

                    returnCurrentCookie();
                }

                // function refreshPage() {
                //     // location.reload();
                //     postExtensionReady();
                //     postTogglePaymentButton();
                // }

                function hideOrderType(data) {
                    var tag = $(' .tag-ordertype');

                    $(acf_orderType + ' select').hide();
                    if (tag) {
                        tag.remove();
                    }
                    $(acf_orderType).append("<p class='savedTag tag-ordertype'>" + data + " <span class='clearAllTags'>Clear</span></p>");
                }

                function hideSalesRep(data) {
                    var tag = $(' .tag-sales');

                    $(acf_salesRep + ' .acf-input').hide();
                    if (tag) {
                        tag.remove();
                    }
                    $(acf_salesRep).append("<p class='savedTag tag-sales'>" + data[0].text + " <span class='clearAllTags'>Clear</span></p>");

                }

                function hideAffiliate(data) {
                    var tag = $(' .tag-affiliate');

                    $(acf_affiliate + ' .acf-input').hide();
                    if (tag) {
                        tag.remove();
                    }

                    if (data.length > 0) {
                        $(acf_affiliate).append("<p class='savedTag tag-affiliate'>" + data[0].text + " <span class='clearAllTags'>Clear</span></p>");
                    } else {
                        $(acf_affiliate).append("<p class='savedTag tag-affiliate'>N/A <span class='clearAllTags'>Clear</span></p>");

                    }

                }

                function initCookies() {
                    var trueTag = {
                        ordertypeVal: '',
                        ordertype: '',
                        salesRep: {},
                        affiliate: {}
                    }
                    Cookies.set('truecustomtags', {
                        ordertypeVal: trueTag.ordertypeVal,
                        ordertype: trueTag.ordertype,
                        salesRep: trueTag.salesRep,
                        affiliate: trueTag.affiliate
                    });
                }

                function returnCurrentCookie() {
                    var cookietest = Cookies.getJSON('truecustomtags');
                    console.log(cookietest)
                }

                $(function() {
                    var options = {
                        byRow: true,
                        property: 'max-height',
                        target: $('.matchThis'),
                        remove: false
                    }

                    $('.matchHeight').matchHeight(options);
                });



                function mapOliverTaxes() {
                    if (oliverTaxResponse.amount_to_collect > 0) { // If there's tax:

                        var taxarr = new Array();
                        var lineItems = oliverTaxResponse.breakdown.line_items;
                        $.each(lineItems, function(i, obj) {
                            var data = {};
                            var origCartData = checkoutData.data.checkoutData.cartProducts;

                            $.each(origCartData, function(i, v) {

                                // IF MATCHING NORMAL LINE ITEMS
                                if (v.productId == obj.id) {
                                    data.amount = v.amount;
                                    data.productId = parseInt(obj.id);
                                    data.variationId = v.variationId;
                                    data.tax = obj.tax_collectable;
                                    data.discountAmount = v.discountAmount;
                                    data.quantity = v.quantity;
                                    data.title = v.title;

                                    taxarr.push(data);

                                    return false;
                                }

                            });

                        });
                        oliverProductTaxes = taxarr;

                    } else {
                        // Set all line item taxes to 0
                        $.each(oliverProductTaxes, function(i, v) {
                            v.tax = 0;
                        });
                    }


                }

                function resetOliverTaxes() {
                    var newShipTo = getShipToOverride();
                    checkoutData.data.checkoutData.addressLine1 = newShipTo.shipping_address_1;
                    checkoutData.data.checkoutData.addressLine2 = newShipTo.shipping_address_2;
                    checkoutData.data.checkoutData.city = newShipTo.shipping_city;
                    checkoutData.data.checkoutData.country = newShipTo.shipping_country;
                    checkoutData.data.checkoutData.state = newShipTo.shipping_state;
                    checkoutData.data.checkoutData.zip = newShipTo.shipping_postcode;

                    // Clear previous TaxJar Response
                    oliverTaxResponse = null;
                    calculateOliverTaxes();
                }

                function calculateOliverTaxes() {

                    var msgData = checkoutData;

                    var checkedAddress = checkCheckoutData(msgData.data.checkoutData);

                    if (checkedAddress.valid) {
                        $("#ship-route").text(msgData.data.checkoutData.addressLine1)
                        $("#ship-addr2").text(msgData.data.checkoutData.addressLine2)
                        $("#ship-rest").text(msgData.data.checkoutData.city + ", " + msgData.data.checkoutData.state + " " + msgData.data.checkoutData.zip + " " + msgData.data.checkoutData.country)
                    } else {
                        showShipToOverride();
                    }

                    if (oliverTaxResponse) {
                        console.log("Already have Tax Response")
                        console.log(oliverTaxResponse)
                        // bail if we already have taxes, to limit API usage
                        return
                    }
                    if (msgData.oliverpos.event == "shareCheckoutData") {
                        if (msgData.data.checkoutData.country !== "") {
                            console.log(msgData.data.checkoutData);
                            let true_pos_nonce = document.getElementById("true_pos_nonce").value;

                            var taxdata = {
                                action: 'get_tax_info',
                                true_pos_nonce: true_pos_nonce,
                                checkoutData: msgData.data.checkoutData,
                                oliverPOSdata: oliverPOSdata
                            }
                            $.ajax({
                                url: truefunction.ajax_url,
                                type: 'get',
                                data: taxdata,
                                contentType: "application/json; charset=utf-8",
                                dataType: "json",
                                beforeSend: function() {
                                    console.log("REQUESTING TAX");
                                    console.log(taxdata);
                                    $(".current-taxes p").hide();
                                    $("#loader").clone().appendTo(".current-taxes").show();
                                    $("#customtags_button, #showShipToOverride").addClass('disabled');
                                },
                                success: function(response) {
                                    console.log(response);
                                    oliverTaxResponse = response.tax;
                                    setTaxUI(response.tax);
                                    updateAddress(response);
                                },
                                error: (error) => {
                                    showAlert(error.responseText, "danger", error.statusText)
                                    console.log(JSON.stringify(error));
                                },
                                complete: function(data) {
                                    $(".current-taxes #loader").remove()
                                }
                            });
                        } else {
                            $("#customTaxKey").text("Error");
                            $(".sep").text(": ");
                            $("#customTaxAmount").text("Not enough address information to calculate taxes. Provide Ship To Address Below.");
                        }
                    }


                }

                function updateAddress(response) {
                    $("#ship-route").text(response.address.street);
                    $("#ship-rest").text(response.address.city + ", " + response.address.state + " " + response.address.zip + " " + response.address.country);
                    if (response.validated.status) {
                        $("#addr-source").text("Validated");
                    } else {
                        $("#addr-source").text("Can't Improve Address");
                    }

                    checkoutData.data.checkoutData.addressLine1 = response.address.street;
                    checkoutData.data.checkoutData.city = response.address.city;
                    checkoutData.data.checkoutData.country = response.address.country;
                    checkoutData.data.checkoutData.state = response.address.state;
                    checkoutData.data.checkoutData.zip = response.address.zip;
                }

                function setTaxUI(response) {
                    $("#customtags_button, #showShipToOverride").removeClass('disabled');

                    $(".current-taxes p").show();
                    if (response.amount_to_collect > 0) {
                        $("#customTaxKey").text(response.jurisdictions.state + " Tax");
                    } else {
                        $("#customTaxKey").text($("#administrative_area_level_1_short").val() + " Tax");
                    }
                    mapOliverTaxes();
                    $("#customTaxAmount").text(response.amount_to_collect.toFixed(2));
                    $(".sep").text(": $");

                }

                // OLIVER POC
                window.addEventListener('message', function(e) {

                    if (e.origin !== oliverExtensionTargetOrigin) {
                        console.log("Invalid origin " + e.origin);
                    } else {
                        var msgData = JSON.parse(e.data);
                        console.log(msgData)
                        if (msgData.oliverpos.event === 'shareCheckoutData') {
                            checkoutData = msgData;
                            calculateOliverTaxes();
                        }
                    }

                }, false);

                function bindEvent(element, eventName, eventHandler) {
                    element.addEventListener(eventName, eventHandler, false);
                }

                // Send a message to the parent
                var sendMessage = function(msg) {
                    window.parent.postMessage(msg, oliverExtensionTargetOrigin);
                };

                var customtagsButton = document.getElementById('customtags_button');
                bindEvent(customtagsButton, 'click', function(e) {
                    console.log("POC")
                    if ($(this).hasClass("disabled")) {
                        //bail since something is missing or wrong
                        return
                    }
                    var ticketID = $("#ticket-id").text();
                    var ticketOrderID = $("#ticket-orderid").text();
                    var ticketCost = $("#ticket-cost").text();
                    var trueTag = Cookies.getJSON('truecustomtags');

                    // console.log(thisTicket[0].id)
                    // if (thisTicket[0].id) {
                    //     var ticketID = thisTicket[0].id;

                    // REGEX to get Woo Order ID
                    // var r = /([0-9]+) .*? /;
                    // var ticketOrderID = thisTicket[0].text.match(r)[1];
                    // }

                    if (trueTag.ordertypeVal == '') {
                        if ($(acf_orderType + ' select').val()) {
                            var ordertype = $(acf_orderType + " option:selected").text();
                        } else {
                            var ordertype = '';
                        }
                        var trueTag = {
                            ordertypeVal: $(acf_orderType + ' select').val(),
                            ordertype: ordertype,
                            salesRep: $(acf_salesRep + " select").select2('data'),
                            affiliate: $(acf_affiliate + " select").select2('data')
                        }
                    }
                    if (trueTag.ordertypeVal == '' || trueTag.salesRep.length == 0) {
                        // RESET EVENT TYPE SINCE THATS THE CHECK FOR ALOT
                        clearAllTags();

                        showAlert("Please Enter an Event Type and Sales Rep", "warning", "Warning")
                        return
                    }

                    if (trueTag.ordertypeVal === 'league' || trueTag.ordertypeVal === 'facility_event') {
                        if (trueTag.affiliate.length == 0) {
                            showAlert("This order type requires an affiliate", "warning", "Warning")
                            return
                        }
                    }

                    if (trueTag.ordertypeVal.length > 0) { // if data exist
                        hideOrderType(trueTag.ordertype);
                    } else {
                        // var ordertypeVal = $( acf_orderType + " option:selected").val();
                        // var ordertype = $( acf_orderType + " option:selected").text();
                    }

                    if (trueTag.salesRep.length > 0) {
                        hideSalesRep(trueTag.salesRep);
                    } else {
                        // var salesRep = $( acf_salesRep + " select" ).select2('data');
                    }

                    // HIDE IF LEFT BLANK, when sending
                    hideAffiliate(trueTag.affiliate)
                    if (trueTag.affiliate.length === 0) {
                        var thisAffiliateID = "N/A";
                    } else {
                        var thisAffiliateID = trueTag.affiliate[0].id
                    }

                    Cookies.set('truecustomtags', {
                        ordertypeVal: trueTag.ordertypeVal,
                        ordertype: trueTag.ordertype,
                        salesRep: trueTag.salesRep,
                        affiliate: trueTag.affiliate
                    });

                    returnCurrentCookie();

                    // GET SHIP TO INFO
                    var shipTo = getShipToOverride();
                    if (shipTo.shipping_country === "") {
                        var shipTo = {
                            shipping_address_1: checkoutData.data.checkoutData.addressLine1,
                            shipping_address_2: checkoutData.data.checkoutData.addressLine2,
                            shipping_city: checkoutData.data.checkoutData.city,
                            shipping_state: checkoutData.data.checkoutData.state,
                            shipping_postcode: checkoutData.data.checkoutData.zip,
                            shipping_country: checkoutData.data.checkoutData.country
                        }
                    }

                    var jsonMsg = {
                        oliverpos: {
                            "event": "addData"
                        },
                        data: {
                            customTags: {
                                "affiliateID": thisAffiliateID,
                                "salesRep": trueTag.salesRep[0].id,
                                "orderType": trueTag.ordertypeVal,
                                "shipTo": shipTo,
                                "oliverPOS": oliverPOSdata
                            },
                            ticket: {
                                "ticketNumber": ticketID,
                                "ticketPrice": ticketCost,
                                "ticketOrderID": ticketOrderID
                            }
                        }
                    }
                    console.log(jsonMsg);
                    console.log("^^ DATA TO OLIVER EXTENSION ^^")

                    sendMessage(JSON.stringify(jsonMsg));

                    if (ticketCost) {
                        // Custom Discount Add
                        var customDiscountKey = "Attendee ID: #" + $("#ticket-id").text();
                        var customDiscountAmount = $("#ticket-cost").text();
                        // var customDiscountType = "number";

                        var discountjsonMsg = {
                            oliverpos: {
                                event: "saveDiscount"
                            },
                            data: {
                                discount: {
                                    "key": customDiscountKey,
                                    "amount": Math.abs(customDiscountAmount)
                                }
                            }
                        }
                        console.log(discountjsonMsg);
                        console.log("^^ DISCOUNT DATA TO OLIVER EXTENSION DISABLED ^^")


                        sendMessage(JSON.stringify(discountjsonMsg));
                    }
                    // end ticket check


                    // Custom Taxes Add
                    var taxjsonMsg = {
                        oliverpos: {
                            event: "updateProductTaxes"
                        },
                        data: {
                            "products": oliverProductTaxes
                        }
                    }
                    console.log(taxjsonMsg);
                    console.log("^^ NO TAX DATA TO OLIVER EXTENSION ^^")

                    // sendMessage(JSON.stringify(taxjsonMsg));

                    // MESSAGES SENT TO OLIVER, ALLOW FINISH EXTENSION BUTTON
                    $(this).text("TAGS SAVED");
                    $("#oliver-msg").hide();
                    $("#extension_finished").removeClass("disabled");
                    // $("#custom_tax_add_button").addClass("disabled");
                });

                var extensionFinishedButton = document.getElementById('extension_finished');
                bindEvent(extensionFinishedButton, 'click', function(e) {
                    if ($(this).hasClass("disabled")) {
                        //bail since something is missing or wrong
                        return
                    }
                    var jsonMsg = {
                        oliverpos: {
                            event: "extensionFinished",
                            wordpressAction: "tds_neworder"
                        }
                    }
                    console.log("----- FINISH DATA TO OLIVER EXTENSION -----")
                    console.log(jsonMsg);

                    sendMessage(JSON.stringify(jsonMsg));

                    disableExtension();

                    // invoke the payment toggle function
                    postTogglePaymentButton(true);
                });

                function disableExtension() {
                    $("#extension_finished").text("CHARGE CREDIT CARD NOW");
                    $("#select2-acf-field_5d4a0a0c75c12-container").select2({
                        disabled: 'readonly'
                    })
                    $('.auto-complete input').each(function() {
                        $(this).attr('readonly', true);
                    });
                    $("#saveNewShipTo,#showShipToOverride").addClass("disabled");
                }

                var postTogglePaymentButton = function(flag = false) {
                    var jsonMsg = {
                        oliverpos: {
                            "event": "togglePaymentButtons"
                        },
                        data: {
                            togglePayment: {
                                "flag": flag
                            }
                        }
                    }

                    sendMessage(JSON.stringify(jsonMsg));

                    var status = flag ? "ENABLED." : "DISABLED.";
                    console.log("Payment Buttons " + status)

                }

                var postExtensionReady = function() {
                    console.log("TRUE Extension is Ready")
                    var jsonMsg = {
                        oliverpos: {
                            "event": "extensionReady"
                        }
                    }

                    sendMessage(JSON.stringify(jsonMsg));
                }

                // Address override
                function getShipToOverride() {

                    var shipTo = {
                        shipping_address_1: $('#street_number').val() + " " + $('#route').val(),
                        shipping_address_2: $('#subpremise').val(),
                        shipping_city: $('#locality').val(),
                        shipping_state: $('#administrative_area_level_1_short').val(),
                        shipping_postcode: $('#postal_code').val(),
                        shipping_country: $('#country_short').val()
                    }
                    return shipTo;
                }

                function showAlert(msg, type, status) {
                    $('#oliver-msg').removeClass("alert-warning alert-info alert-danger")
                    $('#oliver-msg .status').text(status + ": ");
                    $('#oliver-msg .msg').text(msg);
                    $('#oliver-msg').addClass("alert-" + type).show();
                }

                function checkCheckoutData(checkout) {
                    // console.log(checkout)
                    // Returns if address is valid, false is not valid
                    var msg, type, status, valid;
                    switch (true) {
                        case checkout.country === "" || checkout.shipping_country === "":
                            msg = "Customer Missing Country or No Customer Provided.";
                            status = "Error";
                            type = "danger";
                            valid = false;
                            break;
                        case checkout.addressLine1 === "" || checkout.shipping_address_1 === "":
                            msg = "Customer Missing Address Line 1.";
                            status = "Warning";
                            type = "warning";
                            valid = false;
                            break;
                        case checkout.city === "" || checkout.shipping_city === "":
                            msg = "Customer Missing City.";
                            status = "Warning";
                            type = "warning";
                            valid = false;
                            break;
                        case checkout.state === "" || checkout.shipping_state === "":
                            msg = "Customer Missing State.";
                            status = "Error";
                            type = "danger";
                            valid = false;
                            break;
                        case checkout.zip === "" || checkout.shipping_postcode === "":
                            msg = "Customer Missing Zip Code.";
                            status = "Warning";
                            type = "warning";
                            valid = false;
                            break;
                        default:
                            msg = "Customer Address is valid.";
                            status = "Note";
                            type = "info";
                            valid = true;
                    }
                    showAlert(msg, type, status)
                    var data = {
                        msg: msg,
                        type: type,
                        status: status,
                        valid: valid
                    }
                    return data;

                }

                function initGeo() {

                    $('.auto-complete, .map-wrapper').hide();

                    $("#geocomplete-true").geocomplete({
                        map: ".map_canvas",
                        details: ".auto-complete",
                        types: ["geocode", "establishment"],
                        country: 'us'
                    });

                    $("#geocomplete-true")
                        .geocomplete()
                        .bind("geocode:result", function(event, result) {
                            console.log(result);
                            $('.map-wrapper').show();
                        });

                }

                function initPage() {
                    $("#geocomplete-true").focus(function() {
                        // Workaround for some script adding old autocomplete attribute of 'off'
                        $('#geocomplete-true').attr('autocomplete', 'new-password')
                    });

                    $("#extension_finished").addClass("disabled");
                    $("#oliver-msg").hide();

                    // ACF OLIVER
                    var trueTag = Cookies.getJSON('truecustomtags');

                    if (trueTag == undefined) {
                        initCookies();
                    } else {
                        if (trueTag.ordertype) {
                            hideOrderType(trueTag.ordertype);
                        }

                        if (trueTag.salesRep.length > 0) {
                            hideSalesRep(trueTag.salesRep);
                        }

                        if (trueTag.affiliate.length > 0) {
                            hideAffiliate(trueTag.affiliate);
                        }
                    }

                    var taxUImarkup =
                        '<div class="col-6 current-taxes">' +
                        '<h3>Calculated Taxes</h3>' +
                        '<p>' +
                        '<span id="customTaxKey"></span><span class="sep"></span><span id="customTaxAmount"><span>' +
                        '</p>' +
                        '</div>';

                    $('#acf-form').contents().unwrap();
                    $('.acf-field-select, .acf-field-user').wrap("<div class='col-4'></div>");
                    $('.acf-field-post-object').wrap("<div class='event-ticket-search col-6'></div>");
                    $(taxUImarkup).insertAfter('.event-ticket-search');

                    $('.acf-fields').addClass("row")
                    $('.acf-button, .ticket-data').hide();

                    // OLIVER TEST SINCE NO MESSAGE FROM PARENT
                    if (window.location.hostname === "true-diamond-science.local") {
                        oliverEmail = "contact@mitchellsholly.com";
                        checkoutData = {
                            "oliverpos": {
                                "event": "shareCheckoutData"
                            },
                            "data": {
                                "checkoutData": {
                                    "totalTax": "",
                                    "cartProducts": [{
                                            "amount": 80,
                                            "productId": 2046,
                                            "variationId": 0,
                                            "tax": 0,
                                            "discountAmount": 0,
                                            "quantity": 1,
                                            "title": "TRUE Hitting Report"
                                        },
                                        {
                                            "amount": 45,
                                            "productId": 2414,
                                            "variationId": 0,
                                            "tax": 0,
                                            "discountAmount": 0,
                                            "quantity": 1,
                                            "title": "2 Day Shipping"
                                        },
                                        {
                                            "amount": 50,
                                            "productId": 2053,
                                            "variationId": 0,
                                            "tax": 0,
                                            "discountAmount": 0,
                                            "quantity": 1,
                                            "title": "Fitting"
                                        },
                                        {
                                            "amount": 560,
                                            "productId": 1310,
                                            "variationId": 1486,
                                            "tax": 0,
                                            "discountAmount": 0,
                                            "quantity": 2,
                                            "title": "TRUE 2020 T1 USA Youth Bat -10 30.5/20.5 S"
                                        }
                                    ],
                                    "addressLine1": "2780 McDonough St.",
                                    "addressLine2": "",
                                    "city": "Joliet",
                                    "zip": "60436",
                                    "country": "US",
                                    "state": "IL"

                                    // Intentionally wrong for bad address validation handling
                                    // "addressLine1": "44 Calle De Felicidad",
                                    // "addressLine2": "",
                                    // "city": "Joliet",
                                    // "zip": "60436",
                                    // "country": "US",
                                    // "state": "IL"

                                    // "addressLine1": "814 littlejohn st",
                                    // "addressLine2": "Apt 4242",
                                    // "city": "Gastonia",
                                    // "zip": "28052",
                                    // "country": "US",
                                    // "state": "NC"

                                    // "addressLine1": "",
                                    // "addressLine2": "",
                                    // "city": "",
                                    // "zip": "",
                                    // "country": "",
                                    // "state": ""
                                }
                            }
                        }
                        // calculateOliverTaxes();
                    }
                }

                $("[data-hide]").on("click", function() {
                    $("." + $(this).attr("data-hide")).css("opacity", "0");
                });



            })(jQuery);
        </script>
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>