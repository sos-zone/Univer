/*
 * File: app/view/userform.js
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

Ext.define('userpanel.view.userform', {
    extend: 'Ext.form.Panel',
    alias: 'widget.userform',

    requires: [
        'userpanel.view.userformViewModel',
        'Ext.form.field.ComboBox'
    ],

    viewModel: {
        type: 'userform'
    },
    height: 250,
    width: 500,
    bodyPadding: 10,
    title: 'userform',

    items: [
        {
            xtype: 'textfield',
            anchor: '100%',
            width: 300,
            fieldLabel: 'user_id',
            name: 'user_id'
        },
        {
            xtype: 'textfield',
            anchor: '100%',
            width: 300,
            fieldLabel: 'user_name',
            name: 'user_name'
        },
        {
            xtype: 'combobox',
            anchor: '100%',
            width: 300,
            fieldLabel: 'city_name',
            name: 'city_name',
            queryMode: 'local',
            store: [
                'Минск',
                'Москва',
                'Вильнюс',
                'Горки',
                'Владивосток'
            ]
        },
        {
            xtype: 'combobox',
            anchor: '100%',
            width: 300,
            fieldLabel: 'user_educ',
            name: 'user_educ',
            queryMode: 'local',
            store: [
                'Высшее',
                'Среднее',
                'Среднеспециальное'
            ]
        }
    ]

});