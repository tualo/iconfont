Ext.define('IconFont.form.field.ComboBox', {
  extend: 'Ext.form.field.ComboBox',
  requires: [
    'IconFont.data.Store'
  ],
  constructor: function(config) {
    this.store = Ext.create('IconFont.data.Store', {});
    this.callParent([config]);
  },
  store: 'IconFontStore',
  alias: ['widget.iconcombo'],
  //typeAhead: true,
  //lazyRender:true,
  //queryMode: 'local',
  //triggerAction: 'all',
  minChars: 2,
  tpl: '<tpl for="."><div class="x-boundlist-item"><i class="{classname}"></i>&nbsp;&nbsp;{classname}</div></tpl>',
  displayField: 'classname',
  valueField: 'classname'
});
