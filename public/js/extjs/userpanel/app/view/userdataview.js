/*
 * File: app/view/userdataview.js
 *
 * This file was generated by Sencha Architect version 3.2.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 5.1.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 5.1.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('userpanel.view.userdataview', {
    extend: 'Ext.view.View',
    alias: 'widget.userdataview',

    requires: [
        'userpanel.view.userdataviewViewModel',
        'Ext.XTemplate'
    ],

    viewModel: {
        type: 'userdataview'
    },
    height: 425,
    width: 575,
    emptyText: 'Студентов по заданным параметрам не найдено',
    itemSelector: 'div.user-wrapper',
    itemTpl: [
        '<tpl for ".">',
        '    <div class = "user-wrapper">',
        '        <span class="user_id">{user_id}</span>',
        '        <span class="user_name">{user_name}</span>',
        '        <span class="user_educ">{user_educ}</span>',
        '        <span class="city_name">{city_name}</span>',
        '    </div>',
        '</tpl>'
    ],
    store: 'userstore'

});