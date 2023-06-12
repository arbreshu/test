let reverse = 0;
    let selected = 0;
    let coin_symbol = "<?php echo $coin_symbol; ?>";
    let coin_pairs = "<?php echo $coin_pairs; ?>";
    let pair_one = document.getElementById("pair_1");
    let pair_two = document.getElementById("pair_2");
    let pair_one_value = document.getElementById("pair_1").value;
    let pair_two_value = document.getElementById("pair_2").value;
    let last_price = <?php echo $coin_price; ?>;
    let custom_last_price = document.getElementById("custom_last_price");
    let custom_last_price_value = document.getElementById("custom_last_price").value;

    let fee_percentage = document.getElementById("fee_percentage");
    let fee_calculated_euro = 0;

    let network_fee_value = 0;
    let network_fee_amount = 0;

    let total_percentage_amount = 0;
    let last_price_new = 0;


    const last_price_hidden = document.getElementById("last_price");
    const last_price_live = document.getElementById("last_price_live");

    const currency_last_eur = document.getElementById("last_usd");
    // const currency_last_usd = document.getElementById("last_eur");
    const currency_last_mkd = document.getElementById("last_mkd");
    const currency_last_all = document.getElementById("last_all");

    let last_eur = 0;
    let last_usd = 0;
    let last_mkd = 0;
    let last_all = 0;

    let last_price_update = 1;

    let last_eur_update = 1;
    let last_usd_update = 1;
    let last_mkd_update = 1;
    let last_all_update = 1;


    let manual_fee = 0;
    let fee_percentage_value = 0;

    let auto_price = 1;

    let custom_fee = 0;

    let custom_price = 0;

    let include_network_fee_in_price = 0;

    <?php
            $totalWallets = count($wallets);
            if (isset($countedW) && $countedW == 1 && $totalWallets > 0) { ?>
    let total_wallets = <?php echo $totalWallets;  ?>;
    <?php
            }
            ?>

    let total_selected_wallets = 0;

    let update_in_eur = 0;
    let update_in_usd = 0;
    let update_in_mkd = 0;
    let update_in_all = 0;

    let update_in_eur_manual = 0;
    let update_in_usd_manual = 0;
    let update_in_mkd_manual = 0;
    let update_in_all_manual = 0;

    let total_left_eur = 0;
    let total_left_usd = 0;
    let total_left_mkd = 0;
    let total_left_all = 0;

    let total_wallets_left = 0;

    function update_eur_input() {
        let input_value_eur = document.getElementById("exchange_value_eur");

        if (total_selected_wallets > 1 && update_in_eur == 1 && update_in_eur_manual == 0) {
            total_in_euro_do = parseFloat(total_eur_value).toFixed(2);

            final_to_update = (parseFloat(total_in_euro_do) / parseFloat(total_selected_wallets))
            input_value_eur.value = parseFloat(final_to_update).toFixed(2);

        } else if (total_selected_wallets == 1 && update_in_eur == 1 && update_in_eur_manual == 0) {
            input_value_eur.value = parseFloat(total_eur_value).toFixed(2);
        }

        if (update_in_eur_manual == 1 && total_selected_wallets > 1 && update_in_eur == 0) {

            total_in_euro_do2 = parseFloat(total_eur_value).toFixed(2);
            final_to_update2 = (parseFloat(total_in_euro_do2) - parseFloat(input_value_eur.value))
            total_left_eur = parseFloat(final_to_update2).toFixed(2);
            total_left_usd = parseFloat(total_left_eur) * parseFloat(last_eur);
            // alert('TEST');
        } else if (update_in_eur_manual == 1 && total_selected_wallets == 1 && update_in_eur == 0) {

            total_in_euro_do2 = parseFloat(total_eur_value).toFixed(2);
            final_to_update2 = (parseFloat(total_in_euro_do2) - parseFloat(input_value_eur.value))
            total_left_eur = parseFloat(final_to_update2).toFixed(2);
            total_left_usd = parseFloat(total_left_eur) * parseFloat(last_eur);

            // alert('TEST');
        }
    }



    function update_usd_input() {
        let input_value_usd = document.getElementById("exchange_value_usd");

        if (total_selected_wallets > 1 && update_in_usd == 1 && update_in_usd_manual == 0) {
            total_in_usd_do = parseFloat(total_usd_value).toFixed(2);

            final_to_update = (parseFloat(total_in_usd_do) / parseFloat(total_selected_wallets))
            input_value_usd.value = parseFloat(final_to_update).toFixed(2);

        } else if (total_selected_wallets == 1 && update_in_usd == 1 && update_in_usd_manual == 0) {
            input_value_usd.value = parseFloat(total_usd_value).toFixed(2);
        }

        if (update_in_usd_manual == 1 && total_selected_wallets > 1 && update_in_usd == 0) {
            // alert('TEST');
        } else if (update_in_usd_manual == 1 && total_selected_wallets == 1 && update_in_usd == 0) {
            // alert('TEST');
        }
    }


    function update_mkd_input() {
        let input_value_mkd = document.getElementById("exchange_value_mkd");

        if (total_selected_wallets > 1 && update_in_mkd == 1 && update_in_mkd_manual == 0) {
            total_in_mkd_do = parseFloat(total_mkd_value).toFixed(2);

            final_to_update = (parseFloat(total_in_mkd_do) / parseFloat(total_selected_wallets))
            input_value_mkd.value = parseFloat(final_to_update).toFixed(2);

        } else if (total_selected_wallets == 1 && update_in_mkd == 1 && update_in_mkd_manual == 0) {
            input_value_mkd.value = parseFloat(total_mkd_value).toFixed(2);
        }

        if (update_in_mkd_manual == 1 && total_selected_wallets > 1 && update_in_mkd == 0) {
            // alert('TEST');
        } else if (update_in_mkd_manual == 1 && total_selected_wallets == 1 && update_in_mkd == 0) {
            // alert('TEST');
        }
    }

    function update_all_input() {
        let input_value_all = document.getElementById("exchange_value_all");

        if (total_selected_wallets > 1 && update_in_all == 1 && update_in_all_manual == 0) {
            total_in_all_do = parseFloat(total_all_value).toFixed(2);

            final_to_update = (parseFloat(total_in_all_do) / parseFloat(total_selected_wallets))
            input_value_all.value = parseFloat(final_to_update).toFixed(2);

        } else if (total_selected_wallets == 1 && update_in_all == 1 && update_in_all_manual == 0) {
            input_value_all.value = parseFloat(total_all_value).toFixed(2);
        }

        if (update_in_all_manual == 1 && total_selected_wallets > 1 && update_in_all == 0) {
            // alert('TEST');
        } else if (update_in_all_manual == 1 && total_selected_wallets == 1 && update_in_all == 0) {
            // alert('TEST');
        }
    }



    function manual_eur() {
        let input_value_eur = document.getElementById("exchange_value_eur");
        if (update_in_eur_manual == 0) {
            update_in_eur_manual = 1;
            update_in_eur = 0;
            input_value_eur.removeAttribute("readonly");
        } else if (update_in_eur_manual == 1) {
            update_in_eur_manual = 0;
            update_in_eur = 1;
            input_value_eur.setAttribute("readonly", "");
        }
    }


    function manual_usd() {
        let input_value_usd = document.getElementById("exchange_value_usd");
        if (update_in_usd_manual == 0) {
            update_in_usd_manual = 1;
            update_in_usd = 0;
            input_value_usd.removeAttribute("readonly");
        } else if (update_in_usd_manual == 1) {
            update_in_usd_manual = 0;
            update_in_usd = 1;
            input_value_usd.setAttribute("readonly", "");
        }
    }



    function manual_mkd() {
        let input_value_mkd = document.getElementById("exchange_value_mkd");
        if (update_in_mkd_manual == 0) {
            update_in_mkd_manual = 1;
            update_in_mkd = 0;
            input_value_mkd.removeAttribute("readonly");
        } else if (update_in_mkd_manual == 1) {
            update_in_mkd_manual = 0;
            update_in_mkd = 1;
            input_value_mkd.setAttribute("readonly", "");
        }
    }


    function manual_all() {
        let input_value_all = document.getElementById("exchange_value_all");
        if (update_in_all_manual == 0) {
            update_in_all_manual = 1;
            update_in_all = 0;
            input_value_all.removeAttribute("readonly");
        } else if (update_in_all_manual == 1) {
            update_in_all_manual = 0;
            update_in_all = 1;
            input_value_all.setAttribute("readonly", "");
        }
    }


    function on_check_eur() {

        if (update_in_eur == 0) {
            total_selected_wallets = (total_selected_wallets + 1);
            total_wallets_left = (total_wallets_left + 1);
            if (update_in_eur_manual == 0) {
                update_in_eur = 1;
            } else if (update_in_eur_manual == 1) {
                update_in_eur = 0;
                exchange_value_eur.value = 0
            }

        } else if (update_in_eur == 1) {
            total_selected_wallets = (total_selected_wallets - 1);
            total_wallets_left = (total_wallets_left - 1);
            exchange_value_eur.value = 0
            update_in_eur = 0;
        }

    }


    function on_check_usd() {

        if (update_in_usd == 0) {
            total_selected_wallets = (total_selected_wallets + 1);
            total_wallets_left = (total_wallets_left + 1);
            if (update_in_usd_manual == 0) {
                update_in_usd = 1;
            } else if (update_in_usd_manual == 1) {
                exchange_value_usd.value = 0
                update_in_usd = 0;
            }
            // update_in_usd = 1;
        } else if (update_in_usd == 1) {
            total_selected_wallets = (total_selected_wallets - 1);
            total_wallets_left = (total_wallets_left - 1);
            exchange_value_usd.value = 0
            update_in_usd = 0;
        }

    }

    function on_check_mkd() {

        if (update_in_mkd == 0) {
            total_selected_wallets = (total_selected_wallets + 1);
            total_wallets_left = (total_wallets_left + 1);
            // update_in_mkd = 1;
            if (update_in_mkd_manual == 0) {
                update_in_mkd = 1;
            } else if (update_in_mkd_manual == 1) {
                exchange_value_mkd.value = 0
                update_in_mkd = 0;
            }

        } else if (update_in_mkd == 1) {
            total_selected_wallets = (total_selected_wallets - 1);
            total_wallets_left = (total_wallets_left - 1);
            exchange_value_mkd.value = 0
            update_in_mkd = 0;
        }

    }

    function on_check_all() {

        if (update_in_all == 0) {
            total_selected_wallets = (total_selected_wallets + 1);
            total_wallets_left = (total_wallets_left + 1);
            // update_in_all = 1;
            if (update_in_all_manual == 0) {
                update_in_all = 1;
            } else if (update_in_all_manual == 1) {
                exchange_value_all.value = 0
                update_in_all = 0;
            }

        } else if (update_in_all == 1) {
            total_selected_wallets = (total_selected_wallets - 1);
            total_wallets_left = (total_wallets_left - 1);
            exchange_value_all.value = 0
            update_in_all = 0;
        }

    }



    function getCoinPrice(coin_symbol) {
        return $.ajax({
            type: "GET",
            url: 'get_coin_price?coin=' + coin_symbol,
            async: false

        }).responseText;
    }


    function getCurrencyPrice(currency_symbol) {
        return $.ajax({
            type: "GET",
            url: 'get_currency_price?currency=' + currency_symbol + '&type=buy',
            async: false
        }).responseText;
    }


    var intervalCoins = window.setInterval(function() {
        if (auto_price == 1) {
            if (last_price_update == 1) {
                last_price = getCoinPrice('<?php echo $coin_symbol ?>');
                last_price_live.innerText = last_price;
                last_price_hidden.value = last_price;

                calcFirst()
            }
        } else if (auto_price == 0) {
            last_price_live.innerText = last_price;
            last_price_hidden.value = last_price;
            calcFirst()
        }
        updateCurrenciesPrice()
        if (reverse == 0) {
            calcExchangeValues()
        } else if (reverse == 1) {
            // calcSelectedExchangeValues()
        }
        update_eur_input()
        update_usd_input()
        update_mkd_input()
        update_all_input()
        updateFormInputs()
        onChangeEUR()

    }, 2000);

    function updateCurrenciesPrice() {

        if (last_eur_update == 1) {
            last_eur = getCurrencyPrice('EUR');
            currency_last_eur.value = last_eur;
        } else {
            last_eur = currency_last_eur.value;
        }

        if (last_usd_update == 1) {
            last_eur = getCurrencyPrice('EUR');
            currency_last_eur.value = last_eur;
        } else {
            last_eur = currency_last_eur.value;
        }

        if (last_mkd_update == 1) {
            last_mkd = getCurrencyPrice('MKD');
            currency_last_mkd.value = last_mkd;
        } else {
            last_mkd = currency_last_mkd.value;
        }

        if (last_all_update == 1) {
            last_all = getCurrencyPrice('ALL');
            currency_last_all.value = last_all;
        } else {
            last_all = currency_last_all.value;
        }
    }


    function onChangeEUR() {
        let eur_to_usd_total = 0;

        if (reverse == 1) {
            if (selected == "EUR") {
                total_eur_value = custom_eur.value;

                if (network_fee_amount == 0) {
                    eur_to_usd_total_first = custom_eur.value * last_eur;
                } else {
                    eur_to_usd_total_first = custom_eur.value * last_eur - network_fee_amount;
                }

                if (fee_percentage_value != 0) {
                    eur_to_usd_total_fee = (fee_percentage_value / 100) * parseFloat(eur_to_usd_total_first);
                    eur_to_usd_total_second = eur_to_usd_total_first + eur_to_usd_total_fee;
                } else {
                    eur_to_usd_total_second = parseFloat(eur_to_usd_total_first);
                }

                eur_to_usd_total = parseFloat(eur_to_usd_total_second).toFixed(2);

                pair_one.value = (eur_to_usd_total / last_price).toFixed(2);

                custom_usd.value = eur_to_usd_total;
                custom_mkd.value = custom_eur.value * last_mkd;
                custom_all.value = custom_eur.value * last_all;

                total_usd_value = eur_to_usd_total;
                total_mkd_value = custom_eur.value * last_mkd;
                total_all_value = custom_eur.value * last_all;
            } else if (selected == "USD") {
                total_usd_value = custom_usd.value;

                if (network_fee_amount == 0) {
                    usd_total_first = custom_usd.value;
                } else {
                    usd_total_first = custom_usd.value - network_fee_amount;
                }

                if (fee_percentage_value != 0) {
                    usd_total_fee = (fee_percentage_value / 100) * parseFloat(usd_total_first);
                    usd_total_second = usd_total_first + usd_total_fee;
                } else {
                    usd_total_second = parseFloat(usd_total_first).toFixed(2);
                }

                usd_total = parseFloat(usd_total_second).toFixed(2);

                pair_one.value = (usd_total / last_price).toFixed(2);

                total_eur_value = usd_total / last_eur;

                custom_eur.value = total_eur_value.toFixed(2);
                custom_mkd.value = (total_eur_value * last_mkd).toFixed(2);
                custom_all.value = (total_eur_value * last_all).toFixed(2);

                total_mkd_value = (total_eur_value * last_mkd).toFixed(2);
                total_all_value = (total_eur_value * last_all).toFixed(2);
            } else if (selected == "MKD") {
                total_mkd_value = custom_mkd.value;

                total_euro_converted = (total_mkd_value / last_mkd).toFixed(2);
                total_usd_converted = (total_euro_converted * last_eur).toFixed(2);

                if (network_fee_amount == 0) {
                    usd_total_first = total_usd_converted;
                } else {
                    usd_total_first = total_usd_converted - network_fee_amount;
                }

                if (fee_percentage_value != 0) {
                    usd_total_fee = (fee_percentage_value / 100) * parseFloat(usd_total_first);
                    usd_total_second = usd_total_first + usd_total_fee;
                } else {
                    usd_total_second = parseFloat(usd_total_first);
                }

                usd_total = parseFloat(usd_total_second).toFixed(2);

                pair_one.value = (usd_total / last_price).toFixed(2);

                custom_eur.value = total_euro_converted;
                custom_usd.value = usd_total_first;
                custom_all.value = (total_eur_value * last_all).toFixed(2);

                total_eur_value = total_euro_converted;
                total_usd_value = usd_total_first;
                total_mkd_value = (total_eur_value * last_mkd).toFixed(2);
            } else if (selected == "ALL") {
                total_all_value = custom_all.value;

                total_euro_converted = (total_all_value / last_all).toFixed(2);
                total_usd_converted = (total_euro_converted * last_eur).toFixed(2);

                if (network_fee_amount == 0) {
                    usd_total_first = total_usd_converted;
                } else {
                    usd_total_first = total_usd_converted - network_fee_amount;
                }

                if (fee_percentage_value != 0) {
                    usd_total_fee = (fee_percentage_value / 100) * parseFloat(usd_total_first);
                    usd_total_second = usd_total_first - usd_total_fee;
                } else {
                    usd_total_second = parseFloat(usd_total_first);
                }

                usd_total = parseFloat(usd_total_second).toFixed(2);

                pair_one.value = (usd_total / last_price).toFixed(2);

                custom_eur.value = total_euro_converted;
                custom_usd.value = usd_total_first;
                custom_mkd.value = (total_eur_value * last_mkd).toFixed(2);

                total_eur_value = total_euro_converted;
                total_usd_value = usd_total_first;
                total_mkd_value = (total_eur_value * last_mkd).toFixed(2);
            }
        }
    }



    function calcFirst() {
        let changed_val = document.getElementById("pair_1").value;
        pair_one_value = changed_val;
        total = changed_val * last_price;

        pair_two_value = total.toFixed(2);
        pair_two.value = total.toFixed(2);
        calcPercentage()
    }

    function calcSecond() {
        let changed_val2 = document.getElementById("pair_2").value;
        pair_two_value = changed_val2;
        total2 = changed_val2 / last_price;

        pair_one_value = total2.toFixed(8);
        pair_one.value = total2.toFixed(8);
        calcPercentage()

    }


    // function calcPercentage() {

    //     if (pair_two_value != null && manual_fee == 0) {
    //         if (pair_two_value <= 1000) {
    //             fee_percentage_value = 1.5;
    //         } else if (pair_two_value <= 5000 && pair_two_value >= 1000.01) {
    //             fee_percentage_value = 1;
    //         } else if (pair_two_value >= 5000.01 && pair_two_value <= 100000) {
    //             fee_percentage_value = 0.8;
    //         } else if (pair_two_value > 100000) {
    //             fee_percentage_value = 0.8;
    //         } else {
    //             fee_percentage_value = 1.2;
    //         }

    //         // fee_calculated_euro = ;
    //         fee_percentage.value = fee_percentage_value;
    //     }
    // }
    // function calcPercentage() {

    //     if (pair_two_value != null && manual_fee == 0) {
    //         if (pair_two_value <= 10 && pair_two_value >= 1000) {
    //             fee_percentage_value = 1.5;
    //         } else if (pair_two_value <= 5000 && pair_two_value >= 1000.01) {
    //             fee_percentage_value = 1;
    //         } else if (pair_two_value >= 5000.01 && pair_two_value <= 20000) {
    //             fee_percentage_value = 0.8;
    //         } else if (pair_two_value >= 20000.01 && pair_two_value <= 100000) {
    //             fee_percentage_value = 0.8;
    //         } else if (pair_two_value > 100000) {
    //             fee_percentage_value = 0.8;
    //         } else {
    //             fee_percentage_value = 1.5;
    //         }

    //         // fee_calculated_euro = ;
    //         fee_percentage.value = fee_percentage_value;
    //     }
    // }

    <?php
            if (isset($percentages)) {
            ?>

    function calcPercentage() {
        if (pair_two_value != null && manual_fee == 0) {
            <?php $count = 0;
                            $total_percentages = count($percentages);
                            foreach ($percentages as $r) {
                                $count++;
                                $id = $r->id;
                                $start_value = $r->start_value;
                                $end_value = $r->end_value;
                                $percentage = $r->percentage;
                                $symbol = $r->symbol;
                                $symbol_two = $r->symbol_two;?>if(
                pair_two_value <?php echo $symbol; ?> <?php echo $start_value; ?> &&
                pair_two_value <?php echo $symbol_two; ?> <?php echo $end_value; ?>) {
                fee_percentage_value = <?php echo $percentage; ?>;
            }
            <?php if ($count != $total_percentages) { ?>
            else <?php } else {
                                        echo " else {fee_percentage_value = 1.5; }";
                                    } ?> <?php } ?>

            fee_percentage.value = fee_percentage_value;
        }
    }
    <?php
            }
            ?>

    calcPercentage()


    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }


    function includeFees() {
        if (include_network_fee_in_price == 0) {
            include_network_fee_in_price = 1;
        } else if (include_network_fee_in_price == 1) {
            include_network_fee_in_price = 0;
        }
    }

    function calcExchangeValues() {

        let eur_value = document.getElementById("custom_eur");
        let usd_value = document.getElementById("custom_usd");
        let mkd_value = document.getElementById("custom_mkd");
        let all_value = document.getElementById("custom_all");

        if (last_price != null) {

            total_in_usdt = parseFloat(pair_one_value) * parseFloat(last_price);

            if (include_network_fee_in_price == 1) {
                if (network_fee_amount > 0) {
                    total_in_usdt = parseFloat(total_in_usdt) + parseFloat(network_fee_amount);
                } else if (network_fee_amount == 0) {
                    total_in_usdt = parseFloat(total_in_usdt) + 0.5;
                }
            }

            if (include_network_fee_in_price == 0) {
                if (network_fee_amount > 0) {
                    total_network_fee_euro = parseFloat(network_fee_amount) / last_eur;
                } else if (network_fee_amount == 0) {
                    total_network_fee_euro = 0;
                }
            }




            total_in_euro_1 = parseFloat(total_in_usdt) / parseFloat(last_eur);
            total_in_euro = parseFloat(total_in_usdt) / parseFloat(last_eur);
            if (include_network_fee_in_price == 1) {
                total_percentage_fee_eur_amount = (fee_percentage_value / 100) * parseFloat(total_in_euro_1);
            } else if (include_network_fee_in_price == 0) {
                total_in_euro = parseFloat(total_in_euro_1) + parseFloat(total_network_fee_euro);
                total_percentage_fee_eur_amount = (fee_percentage_value / 100) * parseFloat(total_in_euro);
            }




            total_in_euro_final = parseFloat(total_in_euro) - parseFloat(total_percentage_fee_eur_amount);


            total_eur_value = parseFloat(total_in_euro_final);
            total_usd_value = parseFloat(total_in_euro_final) * parseFloat(last_eur);
            total_mkd_value = parseFloat(total_in_euro_final) * parseFloat(last_mkd);
            total_all_value = parseFloat(total_in_euro_final) * parseFloat(last_all);


            eur_value.value = total_eur_value.toFixed(2);
            usd_value.value = total_usd_value.toFixed(2);
            mkd_value.value = total_mkd_value.toFixed(2);
            all_value.value = total_all_value.toFixed(2);
        }


    }


    function calcSelectedExchangeValues() {

        if (reverse == 1) {

            let eur_value = document.getElementById("custom_eur");
            let usd_value = document.getElementById("custom_usd");
            let mkd_value = document.getElementById("custom_mkd");
            let all_value = document.getElementById("custom_all");

            if (last_price != null) {

                total_in_usdt = parseFloat(pair_one_value) * parseFloat(last_price);

                if (include_network_fee_in_price == 1) {
                    if (network_fee_amount > 0) {
                        total_in_usdt = parseFloat(total_in_usdt) + parseFloat(network_fee_amount);
                    } else if (network_fee_amount == 0) {
                        total_in_usdt = parseFloat(total_in_usdt) + 0.5;
                    }
                }

                if (include_network_fee_in_price == 0) {
                    if (network_fee_amount > 0) {
                        total_network_fee_euro = parseFloat(network_fee_amount) / last_eur;
                    } else if (network_fee_amount == 0) {
                        total_network_fee_euro = 0;
                    }
                }

                total_in_euro_1 = parseFloat(total_in_usdt) / parseFloat(last_eur);
                total_in_euro = parseFloat(total_in_usdt) / parseFloat(last_eur);
                if (include_network_fee_in_price == 1) {
                    total_percentage_fee_eur_amount = (fee_percentage_value / 100) * parseFloat(total_in_euro_1);
                } else if (include_network_fee_in_price == 0) {
                    total_in_euro = parseFloat(total_in_euro_1) + parseFloat(total_network_fee_euro);
                    total_percentage_fee_eur_amount = (fee_percentage_value / 100) * parseFloat(total_in_euro);
                }



                total_in_euro_final = parseFloat(total_in_euro) + parseFloat(total_percentage_fee_eur_amount);

                total_eur_value = parseFloat(total_in_euro_final);
                total_usd_value = parseFloat(total_in_euro_final) * parseFloat(last_eur);
                total_mkd_value = parseFloat(total_in_euro_final) * parseFloat(last_mkd);
                total_all_value = parseFloat(total_in_euro_final) * parseFloat(last_all);


                eur_value.value = total_eur_value.toFixed(2);
                usd_value.value = total_usd_value.toFixed(2);
                mkd_value.value = total_mkd_value.toFixed(2);
                all_value.value = total_all_value.toFixed(2);
            }


        }

    }



    function enableCustomFee() {
        const custom_feer = document.getElementById("fee_percentage");
        if (manual_fee == 0) {
            manual_fee = 1;
            custom_feer.removeAttribute("readonly");
        } else if (manual_fee == 1) {
            manual_fee = 0;
            custom_feer.setAttribute("readonly", "");
        }
    }

    function enableCustomSelectEUR() {
        if (reverse == 1) {
            selected = "EUR";
            custom_eur.removeAttribute("readonly", "");
            custom_usd.setAttribute("readonly", "");
            custom_mkd.setAttribute("readonly", "");
            custom_all.setAttribute("readonly", "");
        }
    }

    function enableCustomSelectUSD() {
        if (reverse == 1) {
            selected = "USD";
            custom_usd.removeAttribute("readonly", "");
            custom_eur.setAttribute("readonly", "");
            custom_mkd.setAttribute("readonly", "");
            custom_all.setAttribute("readonly", "");
        }
    }

    function enableCustomSelectMKD() {
        if (reverse == 1) {
            selected = "MKD";
            custom_mkd.removeAttribute("readonly", "");
            custom_usd.setAttribute("readonly", "");
            custom_eur.setAttribute("readonly", "");
            custom_all.setAttribute("readonly", "");
        }
    }

    function enableCustomSelectALL() {
        if (reverse == 1) {
            selected = "ALL";
            custom_all.removeAttribute("readonly", "");
            custom_usd.setAttribute("readonly", "");
            custom_mkd.setAttribute("readonly", "");
            custom_eur.setAttribute("readonly", "");
        }
    }


    function reverseOn() {

        if (reverse == 0) {
            reverse = 1;
            selected = 0;
        } else if (reverse == 1) {
            reverse = 0;
            selected = 0;
        }

    }


    function changeFEE() {
        const custom_feer = document.getElementById("fee_percentage");
        fee_percentage_value = custom_feer.value;
    }


    let custom_usd_status = 0;
    let custom_eur_status = 0;
    let custom_mkd_status = 0;
    let custom_all_status = 0;

    function enableCustomUSD() {
        const custom_usd = document.getElementById("last_usd");
        if (custom_usd_status == 0) {
            last_usd_update = 0;
            last_eur_update = 0;
            custom_usd.removeAttribute("readonly");
            custom_usd_status = 1;
        } else if (custom_usd_status == 1) {
            last_usd_update = 1;
            last_eur_update = 1;
            custom_usd.setAttribute("readonly", "");
            custom_usd_status = 0;
        }
    }

    function enableCustomMKD() {
        const custom_mkd = document.getElementById("last_mkd");
        if (custom_mkd_status == 0) {
            last_mkd_update = 0;
            custom_mkd.removeAttribute("readonly");
            custom_mkd_status = 1;
        } else if (custom_mkd_status == 1) {
            last_mkd_update = 1;
            custom_mkd.setAttribute("readonly", "")
            custom_mkd_status = 0;
        }
    }

    function enableCustomALL() {
        const custom_all = document.getElementById("last_all");
        if (custom_all_status == 0) {
            last_all_update = 0;
            custom_all.removeAttribute("readonly");
            custom_all_status = 1;
        } else if (custom_all_status == 1) {
            last_all_update = 1;
            custom_all.setAttribute("readonly", "")
            custom_all_status = 0;
        }
    }

    function CustomPrice() {


        if (custom_price == 0) {
            custom_price = 1;
            auto_price = 0;
            custom_last_price.removeAttribute("disabled");

        } else if (custom_price == 1) {
            custom_price = 0;
            auto_price = 1;
            custom_last_price.setAttribute('disabled', '');

        }

    }

    function changeLastPrice() {
        last_price = custom_last_price.value
    }


    // function getNetworkFee() {
    //     let network_fee = document.getElementById("network_fee");

    //     if (network_fee != null) {
    //         let network_fee_value = document.getElementById("network_fee").value;

    //         network_fee_amount = network_fee_value;
    //         network_fee_euro_amount = network_fee_value * last_eur;
    //         // alert('good' + network_fee_value);

    //     }
    // }


    $(document).ready(function() {

        $('#selected_network').change(function() {
            var network_symbol = $('#selected_network').val();
            if (network_symbol != '') {
                // $("#next").attr('disabled');
                $.ajax({
                    url: '<?php echo base_url(); ?>agent/fetch_network_fee',
                    method: "POST",
                    data: {
                        symbol: network_symbol
                    },
                    success: function(data) {

                        $('#network_fees').html(data);
                    }
                });
            }


        });

    })



    function updateFormInputs() {

        //exchange rates
        let get_last_eur = last_eur;
        let get_last_usd = last_eur;
        let get_last_mkd = last_mkd;
        let get_last_all = last_all;

        //exchange rates
        let get_total_eur = document.getElementById("custom_eur").value;
        let get_total_usd = document.getElementById("custom_usd").value;
        let get_total_mkd = document.getElementById("custom_mkd").value;
        let get_total_all = document.getElementById("custom_all").value;


        // debit wallet values
        let get_wallet_eur = exchange_value_eur.value;
        let get_wallet_usd = exchange_value_usd.value;
        let get_wallet_mkd = exchange_value_mkd.value;
        let get_wallet_all = exchange_value_all.value;


        // update
        let input_last_eur = document.getElementById("input_last_eur");
        let input_last_usd = document.getElementById("input_last_usd");
        let input_last_mkd = document.getElementById("input_last_mkd");
        let input_last_all = document.getElementById("input_last_all");

        let input_total_eur = document.getElementById("input_total_eur");
        let input_total_usd = document.getElementById("input_total_usd");
        let input_total_mkd = document.getElementById("input_total_mkd");
        let input_total_all = document.getElementById("input_total_all");

        let input_wallet_eur = document.getElementById("input_wallet_eur");
        let input_wallet_usd = document.getElementById("input_wallet_usd");
        let input_wallet_mkd = document.getElementById("input_wallet_mkd");
        let input_wallet_all = document.getElementById("input_wallet_all");

        let buttoni = document.getElementById("buttoni");
        input_last_eur.value = get_last_eur;
        input_last_usd.value = get_last_usd;
        input_last_mkd.value = get_last_mkd;
        input_last_all.value = get_last_all;

        input_total_eur.value = get_total_eur;
        input_total_usd.value = get_total_usd;
        input_total_mkd.value = get_total_mkd;
        input_total_all.value = get_total_all;


        input_wallet_eur.value = get_wallet_eur;
        input_wallet_usd.value = get_wallet_usd;
        input_wallet_mkd.value = get_wallet_mkd;
        input_wallet_all.value = get_wallet_all;



        if (input_wallet_eur.value != 0 || input_wallet_usd.value != 0 || input_wallet_mkd.value != 0 ||
            input_wallet_all.value != 0) {
            buttoni.removeAttribute("disabled");
        } else {
            buttoni.setAttribute('disabled', '');
        }
    }
