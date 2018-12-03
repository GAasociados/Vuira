/**
 * bootstrap-strength-meter.js
 * https://github.com/davidstutz/bootstrap-strength-meter
 *
 * Copyright 2013 David Stutz
 */
!function ($) {

    "use strict";// jshint ;_;

    var StrengthMeter = {

        progressBar: function (input, options) {

            var defaults = {
                container: input.parent(),
                //container_label : 'progress-label',
                base: 80,
                hierarchy: {
                    '0': 'progress-bar-danger',
                    '25': 'progress-bar-warning',
                    '50': 'progress-bar-success'
                },
                label_text_add: {
                    '0': 'label-danger',
                    '25': 'label-warning',
                    '50': 'label-success'
                },
                passwordScore: {
                    options: [],
                    append: true
                }
            };

            var settings = $.extend(true, {}, defaults, options);

            if (typeof options === 'object' && 'hierarchy' in options) {
                settings.hierarchy = options.hierarchy;
            }
            if (typeof options === 'object' && 'label_text_add' in options) {
                settings.label_text_add = options.label_text_add;
            }

            var template = '<div class="progress"><div class="progress-bar" role="progressbar"></div></div>';
            var progress;
            var progressBar;
            var passcheckTimeout;
            // Agregado de label
            var template_label = '<span class="label"></span>';
            var label;
            var label_text;

            var core = {

                /**
                 * Initialize the plugin.
                 */
                init: function () {
                    progress = settings.container.append($(template));
                    progressBar = $('.progress-bar', progress);

                    label = $("#progress-label").append($(template_label));
                    label_text = $('.label', label);

                    progressBar.attr('aria-valuemin', 0)
                        .attr('aria-valuemay', 100);


                    input.on('keyup', core.keyup)
                        .keyup();
                },
                queue: function (event) {
                    var password = $(event.target).val();
                    var value = 0;

                    if (password.length > 0) {
                        var score = new Score(password);
                        value = score.calculateEntropyScore(settings.passwordScore.options, settings.passwordScore.append);
                    }

                    core.update(value);
                },

                /**
                 * Update progress bar.
                 *
                 * @param {string} value
                 */
                update: function (value) {
                    var width = Math.floor((value / settings.base) * 100);

                    if (width > 100) {
                        width = 100;
                    }

                    progressBar
                        .attr('area-valuenow', width)
                        .css('width', width + '%');

                    var texto_label;

                    for (var value in settings.hierarchy) {
                        if (width > value) {
                            progressBar
                                .removeClass()
                                .addClass('progress-bar')
                                .addClass(settings.hierarchy[value]);


                            if (value == 0) {
                                texto_label = '¡La contraseña es insegura! <br/>Debe contener al menos 6 caracteres, mayúsculas y minúsculas y al menos un dígito.'
                            }
                            else if (value == 25) {
                                texto_label = '¡La contraseña es poco segura!'
                            }
                            else if (value == 50) {
                                texto_label = '¡La contraseña es segura!'
                            }

                            label_text
                                .removeClass()
                                //.addClass('label')
                                .html(texto_label)
                            //.addClass(settings.label_text_add[value]);

                        }
                    }
                },

                /**
                 * Event binding on password input.
                 *
                 * @param {Object} event
                 */
                keyup: function (event) {
                    if (passcheckTimeout) clearTimeout(passcheckTimeout);
                    passcheckTimeout = setTimeout(function () {
                        core.queue(event);
                    }, 500);
                }
            };

            core.init();
        },
        text: function (input, options) {

            var defaults = {
                container: input.parent(),
                hierarchy: {
                    '0': ['text-danger', 'ridiculous'],
                    '10': ['text-danger', 'very weak'],
                    '20': ['text-warning', 'weak'],
                    '30': ['text-warning', 'good'],
                    '40': ['text-success', 'strong'],
                    '50': ['text-success', 'very strong']
                },
                passwordScore: {
                    options: [],
                    append: true
                }
            };

            var settings = $.extend(true, {}, defaults, options);

            if (typeof options === 'object' && 'hierarchy' in options) {
                settings.hierarchy = options.hierarchy;
            }

            var core = {

                /**
                 * Initialize the plugin.
                 */
                init: function () {
                    input.on('keyup', core.keyup)
                        .keyup();
                },

                /**
                 * Update text element.
                 *
                 * @param {string} value
                 */
                update: function (value) {
                    for (var border in settings.hierarchy) {
                        if (value >= border) {
                            var text = settings.hierarchy[border][1];
                            var color = settings.hierarchy[border][0];

                            settings.container.text(text)
                                .removeClass()
                                .addClass(color);
                        }
                    }
                },

                /**
                 * Event binding on input element.
                 *
                 * @param {Object} event
                 */
                keyup: function (event) {
                    var password = $(event.target).val();
                    var value = 0;

                    if (password.length > 0) {
                        var score = new Score(password);
                        value = score.calculateEntropyScore(settings.passwordScore.options, settings.passwordScore.append);
                    }

                    core.update(value);
                }
            };

            core.init();
        },

        tooltip: function (input, options) {

            var defaults = {
                hierarchy: {
                    '0': 'ridiculous',
                    '10': 'very weak',
                    '20': 'weak',
                    '30': 'good',
                    '40': 'strong',
                    '50': 'very strong'
                },
                tooltip: {
                    placement: 'right'
                },
                passwordScore: {
                    options: [],
                    append: true
                }
            };

            var settings = $.extend(true, {}, defaults, options);

            if (typeof options === 'object' && 'hierarchy' in options) {
                settings.hierarchy = options.hierarchy;
            }

            var core = {

                /**
                 * Initialize the plugin.
                 */
                init: function () {
                    input.tooltip(settings.tooltip);

                    input.on('keyup', core.keyup)
                        .keyup();
                },

                /**
                 * Update tooltip.
                 *
                 * @param {string} value
                 */
                update: function (value) {
                    for (var border in settings.hierarchy) {
                        if (value >= border) {
                            var text = settings.hierarchy[border];

                            input.attr('data-original-title', text)
                                .tooltip('show');
                        }
                    }
                },

                /**
                 * Event binding on input element.
                 *
                 * @param {Object} event
                 */
                keyup: function (event) {
                    var password = $(event.target).val();
                    var value = 0;

                    if (password.length > 0) {
                        var score = new Score(password);
                        value = score.calculateEntropyScore(settings.passwordScore.options, settings.passwordScore.append);
                    }

                    core.update(value);
                }
            };

            core.init();
        }
    };

    $.fn.strengthMeter = function (type, options) {
        type = (type === undefined) ? 'tooltip' : type;

        if (!type in StrengthMeter) {
            return;
        }

        var instance = this.data('strengthMeter');
        var elem = this;

        return elem.each(function () {
            var strengthMeter;

            if (instance) {
                return;
            }

            strengthMeter = StrengthMeter[type](elem, options);
            elem.data('strengthMeter', strengthMeter);
        });
    };

}(window.jQuery);
