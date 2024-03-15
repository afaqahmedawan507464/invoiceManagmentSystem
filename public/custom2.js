$(document).ready(function () {
    // dublication
    let cloneCounts = 0;
    // items

    $('.add_item_btn').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/getStocksDataz', // replace with the actual URL endpoint
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // data = data.filter(item => item.item_qtv > 0);
                // Check if the maximum limit is reached
                if (cloneCounts < 7) {
                    $('#show_items').append(`
            <div class="ee">
            <div class="row px-2 py-2">
            <div class="col-12 py-2">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <button class="btn btn-outline-danger remove_item_btn"><i class="mx-2 fas fa-trash"></i>Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center py-2">
                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-start py-2">
                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Description</label>
                    <select name="quotationItemDescription[]" id="quotationItemDescription" class="form-control">
                    <option value="">Select Items</option>
                    ${data.map(item => `<option value="${item.id}">${item.item_name}</option>`).join('')}
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center py-2">
                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount/Rate:</label>
                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]">
                </div>
            </div>
        </div>
            </div>
        `);

                    cloneCounts++;

                    // Check if the maximum limit is reached after cloning
                    if (cloneCounts >= 7) {
                        $('.add_item_btn').hide();
                    }
                }
            }
        });
    });

    $(document).on('click', '.remove_item_btn', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.ee');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts < 7) {
            $('.add_item_btn').show();
        }
    });
    // term and conditions
    let cloneCount = 0;

    $('.add_item_btn1').click(function (e) {
        e.preventDefault();

        // Check if the maximum limit is reached
        if (cloneCount < 8) {
            $('#show_items1').append(`
            <div class="eee">
            <div class="row px-2 py-2">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                         <input type="text" class="form-control" placeholder="Ex, Term And Conditions" name="quotationTermAndConditions[]">
                        <button class="btn btn-outline-danger remove_item_btn1 mx-2"><i class="mx-2 fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        `);

            cloneCount++;

            // Check if the maximum limit is reached after cloning
            if (cloneCount >= 5) {
                $('.add_item_btn1').hide();
            }
        }
    });

    $(document).on('click', '.remove_item_btn1', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eee');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCount--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCount < 5) {
            $('.add_item_btn1').show();
        }
    });
    // for disposible
    let cloneCounts4 = 0;
    $('.add_item_btn4').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/getStockDataz', // replace with the actual URL endpoint
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // data = data.filter(item => item.item_qtv > 0);
                // Check if the maximum limit is reached
                if (cloneCounts4 < 9) {
                    $('#show_items4').append(`
                <div class="eeeeee">
                <div class="row px-2 py-2">
                                <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                        <button class="btn btn-outline-danger remove_item_btn4"><i class="mx-2 fas fa-trash"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item:</label>
                                        <select name="quotationItemDescription[]" id="quotationItemDescription" class="form-control">
                                        <option value="">Select Items</option>
                                        ${data.map(item => `<option value="${item.id}">${item.item_name}</option>`).join('')}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Batch No</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemBatchNumber[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Expire Date</label>
                                        <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationItemExpireDate[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Qty</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemQtv[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemPrice[]">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]">
                                    </div>
                                </div>
                            </div>
                </div>
            `);


                    cloneCounts4++;

                    // Check if the maximum limit is reached after cloning
                    if (cloneCounts4 >= 9) {
                        $('.add_item_btn4').hide();
                    }
                }
            }
        });
    });

    $(document).on('click', '.remove_item_btn4', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eeeeee');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts4--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts4 < 9) {
            $('.add_item_btn4').show();
        }
    });
    // for delivery challan
    let cloneCounts5 = 0;
    $('.add_item_btn5').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/getStocksDataz', // replace with the actual URL endpoint
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // data = data.filter(item => item.item_qtv > 0);
                // Check if the maximum limit is reached
                if (cloneCounts5 < 7) {
                    $('#show_items5').append(`
                <div class="eefff">
                <div class="row px-2 py-2">
                                <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <button class="btn btn-outline-danger remove_item_btn5"><i class="mx-2 fas fa-trash"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="deliveryChallanItemSrNumber[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Items:</label>
                                        <select name="deliveryChallanItemDescription[]" id="deliveryChallanItemDescription" class="form-control">
                                        <option value="">Select Items</option>
                                        ${data.map(item => `<option value="${item.id}">${item.item_name}</option>`).join('')}
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quantities:</label>
                                        <input type="number" class="form-control" placeholder="Ex, 132" name="deliveryChallanItemQtv[]">
                                    </div>
                                </div>
                            </div>
            `);

                    cloneCounts5++;

                    // Check if the maximum limit is reached after cloning
                    if (cloneCounts5 >= 7) {
                        $('.add_item_btn5').hide();
                    }
                }
            }
        });
    });

    $(document).on('click', '.remove_item_btn5', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eefff');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts5--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts5 < 8) {
            $('.add_item_btn5').show();
        }
    });
    // 
    let cloneCounts6 = 0;
    $('.add_item_btn7').click(function (e) {
        e.preventDefault();

        // Check if the maximum limit is reached
        if (cloneCounts6 < 7) {
            $('#show_items6').append(`
                <div class="eeffff">
                <div class="row px-2 py-2">
                    <div class="col-12 py-2">
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button class="btn btn-outline-danger remove_item_btn7"><i class="mx-2 fas fa-trash"></i>Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                            <input type="number" class="form-control" placeholder="Ex, 132" name="serviceReportSrNumber[]">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center align-items-start py-2">
                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Question</label>
                            <input type="text" class="form-control" placeholder="Ex, Question" name="serviceReportQuestion[]">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Answer:</label>
                            <input type="text" class="form-control" placeholder="Ex, yes or no" name="serviceReportanswer[]">
                        </div>
                    </div>
                </div>
                </div>
            `);

            cloneCounts6++;

            // Check if the maximum limit is reached after cloning
            if (cloneCounts6 >= 7) {
                $('.add_item_btn7').hide();
            }
        }
    });
    $(document).on('click', '.remove_item_btn7', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eeffff');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts6--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts6 < 8) {
            $('.add_item_btn7').show();
        }
    });
    // 
    let cloneCounts7 = 0;
    $('.add_item_btn11').click(function (e) {
        e.preventDefault();

        // Check if the maximum limit is reached
        if (cloneCounts7 < 7) {
            $('#show_items7').append(`
                <div class="eeffffg">
                <div class="row px-2 py-2">
                            <div class="col-12 py-2">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4 d-flex justify-content-end align-items-center">
                                        <button class="btn btn-outline-danger remove_item_btn11"><i class="mx-2 fas fa-trash"></i>Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Model:</label>
                                    <input type="text" class="form-control" placeholder="Ex, cf-140L" name="quotationItemScopeModel[]">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Sr No:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemScopeSrNumber[]">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Problem</label>
                                    <textarea name="quotationItemProblem[]" id="quotationItemProblem" class="form-control" placeholder="Ex, Description" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Need Work</label>
                                    <textarea name="quotationItemNeedWork[]" id="quotationItemNeedWork" class="form-control" placeholder="Ex, Description" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount/Rate:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]">
                                </div>
                            </div>
                        </div>
                </div>
            `);

            cloneCounts7++;

            // Check if the maximum limit is reached after cloning
            if (cloneCounts7 >= 7) {
                $('.add_item_btn11').hide();
            }
        }
    });
    $(document).on('click', '.remove_item_btn11', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eeffffg');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts7--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts7 < 8) {
            $('.add_item_btn8').show();
        }
    });

    let cloneCounts10 = 0;
    $('.add_item_btn13').click(function (e) {
        e.preventDefault();
        if (cloneCounts10 < 7) {
            $('#show_items13').append(`
                <div class="eeffffgssss">
                <div class="row px-2 py-2">
                <div class="col-12 py-2">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <button class="btn btn-outline-danger remove_item_btn13"><i class="mx-2 fas fa-trash"></i>Remove</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Expense Type:</label>
                        <select name="expenseType[]" id="expenseType" class="form-control">
                            <option value="">Select Expense Category</option>
                            <option value="1">Utilities Expense</option>
                            <option value="2">Travel Expense</option>
                            <option value="3">Shippment Expense</option>
                            <option value="4">Office Expense</option>
                            <option value="5">Utilities Expense</option>
                            <option value="6">Salaries Expense</option>
                            <option value="7">Office Rent</option>
                            <option value="8">MD Expense</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount:</label>
                        <input type="text" class="form-control" placeholder="Ex, 132" name="expenseAmount[]">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Payment Type:</label>
                        <select name="expensePaymentType[]" id="expensePaymentType" class="form-control">
                            <option value="">Select Payment Type</option>
                            <option value="1">Cash Payment</option>
                            <option value="2">Online Payment</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Voucher Number:</label>
                        <input type="text" class="form-control" placeholder="Ex, abc123" name="expenseVoucherNumber[]">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-start py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Details:</label>
                        <textarea name="expenseDetails[]" id="expenseDetails" cols="30" rows="3" placeholder="Ex, demo details" class="form-control"></textarea>
                    </div>
                </div>
            </div>    
                </div>
            `);

            cloneCounts10++;

            // Check if the maximum limit is reached after cloning
            if (cloneCounts10 >= 7) {
                $('.add_item_btn13').hide();
            }
        }
    });


    $(document).on('click', '.remove_item_btn13', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eeffffgssss');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts10--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts10 < 8) {
            $('.add_item_btn8').show();
        }
    });
    // 
    let cloneCounts11 = 0;
    $('.add_item_btn15').click(function (e) {
        e.preventDefault();
        if (cloneCounts11 < 7) {
            $('#show_items15').append(`
                <div class="eeffffgssssz">
                <div class="row px-2 py-2">
                                <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <button class="btn btn-outline-danger remove_item_btn15"><i class="mx-2 fas fa-trash"></i>Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Received From:</label>
                                        <input type="text" class="form-control" placeholder="Ex, demo person name" name="expensePersonName[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 132" name="expenseAmount[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Payment:</label>
                                        <select name="expenseType[]" id="expenseType" class="form-control">
                                            <option value="">Select Payment</option>
                                            <option value="1">Payment Send</option>
                                            <option value="2">Payment Received</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Payment Type:</label>
                                        <select name="expensePaymentType[]" id="expensePaymentType" class="form-control">
                                            <option value="">Select Payment Type</option>
                                            <option value="1">Cash Payment</option>
                                            <option value="2">Online Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Bank Name:</label>
                                        <input type="text" class="form-control" placeholder="Ex, demo bank name" name="expenseBankName[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Account Number:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="expenseBankAccountNumber[]">
                                    </div>
                                </div>
                                <div class="col-12 d-none">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Check Number:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="expenseCheckNumber[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Transection Id:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="expenseTransectionId[]">
                                    </div>
                                </div>
                            </div>
                </div>
            `);

            cloneCounts11++;

            // Check if the maximum limit is reached after cloning
            if (cloneCounts11 >= 7) {
                $('.add_item_btn15').hide();
            }
        }
    });


    $(document).on('click', '.remove_item_btn15', function (e) {
        e.preventDefault();
        let deleted_row = $(this).closest('.eeffffgssssz');
        $(deleted_row).remove();

        // Decrease the count when removing an item
        cloneCounts11--;

        // Show the "add_item_btn1" button if the count is less than 8
        if (cloneCounts11 < 8) {
            $('.add_item_btn15').show();
        }
    });
});