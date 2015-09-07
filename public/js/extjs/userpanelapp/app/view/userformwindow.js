/*
 * File: app/view/userformwindow.js
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

Ext.define('userpanel.view.userformwindow', {
    extend: 'Ext.window.Window',
    alias: 'widget.userformwindow',

    requires: [
        'userpanel.view.userformwindowViewModel',
        'userpanel.view.userform',
        'Ext.form.Panel'
    ],

    config: {
        buttons: [
            {
                text: 'Сохранить',
                action: 'saveuser'
            }
        ]
    },

    viewModel: {
        type: 'userformwindow'
    },
    height: 350,
    width: 500,
    closeAction: 'hide',
    title: 'Редактирование...',

    items: [
        {
            xtype: 'userform'
        }
    ]

});