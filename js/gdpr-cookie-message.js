/*! ****************************************************************************
 *  &#8482;ToReMeTaL {cookie.js}.
 *  Copyright (C) 2022 &#8482;ToReMeTaL.
 *
 *  Licensed under the MIT license:
 *  http://www.opensource.org/licenses/mit-license.php
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 ******************************************************************************/
(function ($) {

    /*
    |--------------------------------------------------------------------------
    | Cookie Message
    |--------------------------------------------------------------------------
    |
    | Displays the cookie message on first visit or 1 year after their
    | last visit.
    |
    | @param event - 'reinit' to reopen the cookie message
    |
    */
    $.fn.ihavecookies = function (options, event) {

        var $element = $(this);

        // Set defaults
        var settings = $.extend({
            cookieTypes: [
                {
                    type: 'Site Preferences',
                    value: 'preferences',
                    description: 'These are cookies that are related to your site preferences, e.g. remembering your username, site colours, etc.'
                },
                {
                    type: 'Analytics',
                    value: 'analytics',
                    description: 'Cookies related to site visits, browser types, etc.'
                },
                {
                    type: 'Marketing',
                    value: 'marketing',
                    description: 'Cookies related to ads and marketing, e.g. Ad Targeting'
                }
            ],
            title: "&#8482;T&#169;ReMeTaL &#x1F36A;'s",
            message: '<small>We use cookies for <br/>* Personalised ads, content, ad and content measurement, audience insights, analytics, and development.</small><br/> Learn more ',
            pplink: '<a class="#gdpr-cookie-messagea" href="/legal/ad-settings/">More-Info</a> | <a id="gdpr-cookie-messagea" title="&#8482;T&#169;ReMeTaL Cookie Policy" onclick="window.location=' + "'" + '/legal/cookie-policy' + "'" + '">Cookie Policy</a>',
            moreInfoLabel: '',
            cplink: '',
            adBtnLink: '<script>function adSettings() {window.location="/legal/ad-settings/";}</' + 'script>',
            /*'<a href="?fc=alwaysshow">', ?fc=alwaysshow */
            adBtnLabel: 'Ad Settings',
            delay: 500,
            expires: 30,
            moreInfoLabelp: '',
            acceptBtnLabel: 'Allow Cookies',
            advancedBtnLabel: 'Cookie Options',
            cookieTypesTitle: 'You can dis-able any non-necessary cookies.',
            fixedCookieTypeLabel: 'Necessary',
            fixedCookieTypeDesc: 'These are cookies that are Necessary for the website to work correctly.',
            onAccept: function () {
                var myPreferences = $.fn.ihavecookies.cookie();
                //console.log('The following preferences were saved...');
                //console.log(myPreferences);
                //console.log(myPreferences[1]);
                /* // method 1 */
                /*console.log("Allow Personal-Ads:" + myPreferences.includes("marketing"));
                console.log("Allow Analytics:" + myPreferences.includes("analytics"));
                console.log("Allow Preferences:" + myPreferences.includes("preferences"));*/
                /* // method 2
                myPreferences.forEach(myFunction);
                function myFunction(item) {
                  console.log(item);
                  if (item.includes("marketing")) {
                     console.log("Allow Personal-Ads:");
                  }
                  if (item.includes("analytics")) {
                     console.log("Allow Analytics:");
                  }
                  if (item.includes("preferences")) {
                     console.log("Allow Preferences:");
                  }
                }*/
                /*console.save(myPreferences, 'NotUsed');
                if (myPreferences.includes("marketing")) {
                   window.location = '?fc=alwaysshow';
                }*/

                if ($.fn.ihavecookies.preference('analytics') === true) {
                    console.log('Consent: Analytic cookies are allowed.');
                    gtag('js', new Date());
                    gtag('consent', 'update', { 'analytics_storage': 'granted' });
                } else {
                    console.log('Consent: Analytic cookies are not allowed.');
                    gtag('js', new Date());
                    gtag('consent', 'update', { 'analytics_storage': 'denied' });
                }
                if ($.fn.ihavecookies.preference('marketing') === true) {
                    console.log('Consent: marketing cookies are allowed.');
                    gtag('js', new Date());
                    gtag('consent', 'update', { 'ad_storage': 'granted' });
                    (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 0;
                    /*(adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 0;*/
                } else {
                    console.log('Consent: marketing cookies are not allowed.');
                    gtag('js', new Date());
                    gtag('consent', 'update', { 'ad_storage': 'denied' });
                    (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1;
                    /*(adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 0;*/
                }
                if ($.fn.ihavecookies.preference('preferences') === true) {
                    console.log('Consent: preference cookies are allowed.');
                } else {
                    console.log('Consent: preference cookies are not allowed.');
                }
            },
            uncheckBoxes: true
        }, options);

        var myCookie = getCookie('cookieControl');
        var myCookiePrefs = getCookie('cookieControlPrefs');
        if (!myCookie || !myCookiePrefs || event == 'reinit') {
            // Remove all instances of the cookie message so it's not duplicated
            $('#gdpr-cookie-message').remove();

            // Set the 'necessary' cookie type checkbox which can not be unchecked
            var cookieTypes = '<li><input type="checkbox" name="gdpr[]" value="necessary" checked="checked" disabled="disabled"> <label title="' + settings.fixedCookieTypeDesc + '">' + settings.fixedCookieTypeLabel + '</label></li>';

            // Generate list of cookie type checkboxes
            preferences = JSON.parse(myCookiePrefs);
            $.each(settings.cookieTypes, function (index, field) {
                if (field.type !== '' && field.value !== '') {
                    var cookieTypeDescription = '';
                    if (field.description !== false) {
                        cookieTypeDescription = ' title="' + field.description + '"';
                    }
                    cookieTypes += '<li id="gdpr-cookie-messageli"><input type="checkbox" id="gdpr-cookietype-' + field.value + '" name="gdpr[]" value="' + field.value + '" data-auto="on"> <label for="gdpr-cookietype-' + field.value + '"' + cookieTypeDescription + '>' + field.type + '</label></li>';
                }
            });
            // Display cookie message on page
            var cookieMessage = '<div id="gdpr-cookie-message" align="center" style="line-height: 0;"><button style="position:absolute;right:4px;top:4px;background-color:transparent;" onclick="document.getElementById(' + "'gdpr-cookie-message'" + ').hidden = true;">[X]</button><h4 id="gdpr-cookie-messageh4">' + settings.title + '</h4><p id="gdpr-cookie-messagep" style="padding:0;" align="center">' + settings.message + settings.pplink + settings.moreInfoLabel + '.</p><br/> <a id="gdpr-cookie-messagea" href="' + settings.cplink + '">' + settings.moreInfoLabelp + '</a><br /><div id="gdpr-cookie-types" style="display:none;line-height:0;"><h5 id="gdpr-cookie-messageh5">' + settings.cookieTypesTitle + '</h5><ul id="gdpr-cookie-messageul">' + cookieTypes + '</ul></div><div style="margin-left:0"><button onclick="adSettings()" type="button" title="customize ad permissions" id="gdpr-cookie-ads">' + settings.adBtnLabel + '</button><p id="gdpr-cookie-messagep" style="padding:20px"><button title="allow cookies" id="gdpr-cookie-accept" type="button">' + settings.acceptBtnLabel + '</button><button width="150px" title="customize permission" min-width="100px" id="gdpr-cookie-advanced" type="button">' + settings.advancedBtnLabel + '</button></p>' + settings.adBtnLink + '</div></div>';
            setTimeout(function () {
                $($element).append(cookieMessage);
                $('#gdpr-cookie-message').hide().fadeIn('slow', function () {
                    // If reinit'ing, open the advanced section of message
                    // and re-check all previously selected options.
                    if (event == 'reinit') {
                        $('#gdpr-cookie-advanced').trigger('click');
                        $.each(preferences, function (index, field) {
                            $('input#gdpr-cookietype-' + field).prop('checked', true);
                        });
                    }
                });
            }, settings.delay);

            // When accept button is clicked drop cookie
            $('body').on('click', '#gdpr-cookie-accept', function () {
                // Set cookie
                dropCookie(true, settings.expires);

                // If 'data-auto' is set to ON, tick all checkboxes because
                // the user hasn't clicked the customise cookies button
                $('input[name="gdpr[]"][data-auto="on"]').prop('checked', true);

                // Save users cookie preferences (in a cookie!)
                var prefs = [];
                $.each($('input[name="gdpr[]"]').serializeArray(), function (i, field) {
                    prefs.push(field.value);
                });
                setCookie('cookieControlPrefs', encodeURIComponent(JSON.stringify(prefs)), 365);

                // Run callback function
                settings.onAccept.call(this);
            });

            // Toggle advanced cookie options
            $('body').on('click', '#gdpr-cookie-advanced', function () {
                // Uncheck all checkboxes except for the disabled 'necessary'
                // one and set 'data-auto' to OFF for all. The user can now
                // select the cookies they want to accept.
                $('input[name="gdpr[]"]:not(:disabled)').attr('data-auto', 'off').prop('checked', false);
                $('#gdpr-cookie-types').slideDown('fast', function () {
                    $('#gdpr-cookie-advanced').prop('disabled', true);
                });
            });
        } else {
            var cookieVal = true;
            if (myCookie == 'false') {
                cookieVal = false;
            }
            dropCookie(cookieVal, settings.expires);
        }

        // Uncheck any checkboxes on page load
        if (settings.uncheckBoxes === true) {
            $('input[type="checkbox"].ihavecookies').prop('checked', false);
        }

    };

    // Method to get cookie value
    $.fn.ihavecookies.cookie = function () {
        var preferences = getCookie('cookieControlPrefs');
        return JSON.parse(preferences);
    };

    // Method to check if user cookie preference exists
    $.fn.ihavecookies.preference = function (cookieTypeValue) {
        var control = getCookie('cookieControl');
        var preferences = getCookie('cookieControlPrefs');
        preferences = JSON.parse(preferences);
        if (control === false) {
            return false;
        }
        if (preferences === false || preferences.indexOf(cookieTypeValue) === -1) {
            return false;
        }
        return true;
    };

    /*
    |--------------------------------------------------------------------------
    | Drop Cookie
    |--------------------------------------------------------------------------
    |
    | Function to drop the cookie with a boolean value of true.
    |
    */
    var dropCookie = function (value, expiryDays) {
        setCookie('cookieControl', value, expiryDays);
        $('#gdpr-cookie-message').fadeOut('fast', function () {
            $(this).remove();
        });
    };

    /*
    |--------------------------------------------------------------------------
    | Set Cookie
    |--------------------------------------------------------------------------
    |
    | Sets cookie with 'name' and value of 'value' for 'expiry_days'.
    |
    */
    var setCookie = function (name, value, expiry_days) {
        var d = new Date();
        d.setTime(d.getTime() + (expiry_days * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/;secure;samesite=strict";
        return getCookie(name);
    };

    /*
    |--------------------------------------------------------------------------
    | Get Cookie
    |--------------------------------------------------------------------------
    |
    | Gets cookie called 'name'.
    |
    */
    var getCookie = function (name) {
        var cookie_name = name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(cookie_name) === 0) {
                return c.substring(cookie_name.length, c.length);
            }
        }
        return false;
    };

}(jQuery));

var options = {
    delay: 500,
    expires: 30,
    uncheckBoxes: true/*,
                onAccept: function () {
                    if ($.fn.ihavecookies.preference('analytics') === true) {
                        console.log('Consent: Analytic cookies are allowed.');
                        gtag('js', new Date());
                        gtag('consent', 'update', { 'analytics_storage': 'granted' });
                    } else {
                        console.log('Consent: Analytic cookies are not allowed.');
                        gtag('js', new Date());
                        gtag('consent', 'update', { 'analytics_storage': 'denied' });
                    }
                    if ($.fn.ihavecookies.preference('marketing') === true) {
                        console.log('Consent: marketing cookies are allowed.');
                        gtag('js', new Date());
                        gtag('consent', 'update', { 'ad_storage': 'granted' });
                        (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 0;
                        //(adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 0;
                    } else {
                        console.log('Consent: marketing cookies are not allowed.');
                        gtag('js', new Date());
                        gtag('consent', 'update', { 'ad_storage': 'denied' });
                        (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1;
                        //(adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 0;
                    }
                    if ($.fn.ihavecookies.preference('preferences') === true) {
                        console.log('Consent: preference cookies are allowed.');
                    } else {
                        console.log('Consent: preference cookies are not allowed.');
                    }*/
    /*try {
        var myPreferences = $.fn.ihavecookies.cookie();
        console.log($.fn.ihavecookies.cookie());
        console.log("Allow Personal-Ads:" + myPreferences.includes("marketing"));
        console.log("Allow Analytics:" + myPreferences.includes("analytics"));
        console.log("Allow Preferences:" + myPreferences.includes("preferences"));
        //console.save(myPreferences, 'test.txt');
        if ($.fn.ihavecookies.cookie().includes("marketing")) {
            if (1) { window.location = '?fc=alwaysshow'; }
        }
    } catch (e) {
        //console.error(e);
    }
}*/
}
$(document).ready(function () {
    $('body').ihavecookies(options);
    if ($.fn.ihavecookies.preference('analytics') === true) {
        console.log('Consent: Analytic cookies are allowed.');
        gtag('js', new Date());
        gtag('config', 'G-M20V5KWRLY');
    } else {
        console.log('Consent: Analytic cookies are not allowed.');
    }
    if ($.fn.ihavecookies.preference('marketing') === true) {
        console.log('Consent: marketing cookies are allowed.');
        (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 0;
    } else {
        console.log('Consent: marketing cookies are not allowed.');
        (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1;
    }
    if ($.fn.ihavecookies.preference('preferences') === true) {
        console.log('Consent: preference cookies are allowed.');
    } else {
        console.log('Consent: preference cookies are not allowed.');
    }
    $('#ihavecookiesBtn').on('click', function () {
        $('body').ihavecookies(options, 'reinit');
    });
});