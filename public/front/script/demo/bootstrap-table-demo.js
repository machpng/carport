/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
function cellStyle(value, row, index) {
  var classes = ['active', 'success', 'info', 'warning', 'danger'];

  if (index % 2 === 0 && index / 2 < classes.length) {
    return {
      classes: classes[index / 2]
    };
  }
  return {};
}

function rowStyle(row, index) {
  var classes = ['active', 'success', 'info', 'warning', 'danger'];

  if (index % 2 === 0 && index / 2 < classes.length) {
    return {
      classes: classes[index / 2]
    };
  }
  return {};
}

function scoreSorter(a, b) {
  if (a > b) return 1;
  if (a < b) return -1;
  return 0;
}

function nameFormatter(value) {
  return value + '<i class="icon wb-book" aria-hidden="true"></i> ';
}

function starsFormatter(value) {
  return '<i class="icon wb-star" aria-hidden="true"></i> ' + value;
}

function queryParams() {
  return {
    type: 'owner',
    sort: 'updated',
    direction: 'desc',
    per_page: 1005,
    page: 1
  };
}

function buildTable($el, cells, rows) {
  var i, j, row,
    columns = [],
    data = [];

  for (i = 0; i < cells; i++) {
    columns.push({
      field: '字段' + i,
      title: '单元' + i
    });
  }
  for (i = 0; i < rows; i++) {
    row = {};
    for (j = 0; j < cells; j++) {
      row['字段' + j] = 'Row-' + i + '-' + j;
    }
    data.push(row);
  }
  $el.bootstrapTable('destroy').bootstrapTable({
    columns: columns,
    data: data,
    iconSize: 'outline',
    icons: {
      columns: 'glyphicon-list'
    }
  });
}

(function(document, window, $) {
  'use strict';

  // Example Bootstrap Table From Data
  // ---------------------------------
  (function() {
    var bt_data = [{
      "Tid": "1",
      "First": "奔波儿灞",
      "sex": "男",
      "Score": "50"
    }, {
      "Tid": "2",
      "First": "灞波儿奔",
      "sex": "男",
      "Score": "94"
    }, {
      "Tid": "3",
      "First": "作家崔成浩",
      "sex": "男",
      "Score": "80"
    }, {
      "Tid": "4",
      "First": "韩寒",
      "sex": "男",
      "Score": "67"
    }, {
      "Tid": "5",
      "First": "郭敬明",
      "sex": "男",
      "Score": "100"
    }, {
      "Tid": "6",
      "First": "马云",
      "sex": "男",
      "Score": "77"
    }, {
      "Tid": "7",
      "First": "范爷",
      "sex": "女",
      "Score": "87"
    }];


    $('#exampleTableFromData').bootstrapTable({
      data: bt_data,
      // mobileResponsive: true,
      height: "250"
    });
  })();

  // Example Bootstrap Table Columns
  // -------------------------------
  (function() {
    $('#exampleTableColumns').bootstrapTable({
      url: "js/demo/bootstrap_table_test.json",
      height: "400",
      iconSize: 'outline',
      showColumns: true,
      icons: {
        refresh: 'glyphicon-repeat',
        toggle: 'glyphicon-list-alt',
        columns: 'glyphicon-list'
      }
    });
  })();


  // Example Bootstrap Table Large Columns
  // -------------------------------------
  buildTable($('#exampleTableLargeColumns'), 50, 50);


  // Example Bootstrap Table Toolbar
  // -------------------------------
  (function() {
    $('#exampleTableToolbar').bootstrapTable({
      url: "js/demo/bootstrap_table_test2.json",
      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      toolbar: '#exampleToolbar',
      iconSize: 'outline',
      icons: {
        refresh: 'glyphicon-repeat',
        toggle: 'glyphicon-list-alt',
        columns: 'glyphicon-list'
      }
    });
  })();


    // Example Bootstrap Table Toolbar分页：客户端
  // -------------------------------
  (function() {
	var mynewdata=[
    {
        "id": 0,
        "name": "测试0",
        "price": "&yen;0",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 1,
        "name": "测试1",
        "price": "&yen;1",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 2,
        "name": "测试2",
        "price": "&yen;2",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 3,
        "name": "测试3",
        "price": "&yen;3",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 4,
        "name": "测试4",
        "price": "&yen;4",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 5,
        "name": "测试5",
        "price": "&yen;5",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 6,
        "name": "测试6",
        "price": "&yen;6",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 7,
        "name": "测试7",
        "price": "&yen;7",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 8,
        "name": "测试8",
        "price": "&yen;8",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 9,
        "name": "测试9",
        "price": "&yen;9",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 10,
        "name": "测试10",
        "price": "&yen;10",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 11,
        "name": "测试11",
        "price": "&yen;11",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 12,
        "name": "测试12",
        "price": "&yen;12",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 13,
        "name": "测试13",
        "price": "&yen;13",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 14,
        "name": "测试14",
        "price": "&yen;14",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 15,
        "name": "测试15",
        "price": "&yen;15",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 16,
        "name": "测试16",
        "price": "&yen;16",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 17,
        "name": "测试17",
        "price": "&yen;17",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 18,
        "name": "测试18",
        "price": "&yen;18",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 19,
        "name": "测试19",
        "price": "&yen;19",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    },
    {
        "id": 20,
        "name": "测试20",
        "price": "&yen;20",
        "column1": "c10",
        "column2": "c20",
        "column3": "c30",
        "column4": "c40"
    }
];
    $('#exampleTablePagination').bootstrapTable({
      //url: "js/demo/bootstrap_table_test2.json",
	  data:mynewdata,
      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
	  sortable:true,
	  silentSort:true,
      //toolbar: '#exampleToolbar',
      iconSize: 'outline',
      icons: {
        refresh: 'glyphicon-repeat',
        toggle: 'glyphicon-list-alt',
        columns: 'glyphicon-list'
      }
    });
  })();
  
  
  // Example Bootstrap Table Events
  // ------------------------------
  (function() {
    $('#exampleTableEvents').bootstrapTable({
      url: "js/demo/bootstrap_table_test.json",
      search: true,
      pagination: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      iconSize: 'outline',
      toolbar: '#exampleTableEventsToolbar',
      icons: {
        refresh: 'glyphicon-repeat',
        toggle: 'glyphicon-list-alt',
        columns: 'glyphicon-list'
      }
    });

    var $result = $('#examplebtTableEventsResult');

    $('#exampleTableEvents').on('all.bs.table', function(e, name, args) {
        console.log('Event:', name, ', data:', args);
      })
      .on('click-row.bs.table', function(e, row, $element) {
        $result.text('Event: click-row.bs.table');
      })
      .on('dbl-click-row.bs.table', function(e, row, $element) {
        $result.text('Event: dbl-click-row.bs.table');
      })
      .on('sort.bs.table', function(e, name, order) {
        $result.text('Event: sort.bs.table');
      })
      .on('check.bs.table', function(e, row) {
        $result.text('Event: check.bs.table');
      })
      .on('uncheck.bs.table', function(e, row) {
        $result.text('Event: uncheck.bs.table');
      })
      .on('check-all.bs.table', function(e) {
        $result.text('Event: check-all.bs.table');
      })
      .on('uncheck-all.bs.table', function(e) {
        $result.text('Event: uncheck-all.bs.table');
      })
      .on('load-success.bs.table', function(e, data) {
        $result.text('Event: load-success.bs.table');
      })
      .on('load-error.bs.table', function(e, status) {
        $result.text('Event: load-error.bs.table');
      })
      .on('column-switch.bs.table', function(e, field, checked) {
        $result.text('Event: column-switch.bs.table');
      })
      .on('page-change.bs.table', function(e, size, number) {
        $result.text('Event: page-change.bs.table');
      })
      .on('search.bs.table', function(e, text) {
        $result.text('Event: search.bs.table');
      });
  })();
})(document, window, jQuery);
