<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Active Record in CodeIgniter</title>

	<style type="text/css">
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

    .clear{
        clear: both;
    }

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 18pt;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
        text-align: center;
        font-weight: bold;
	}

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

	#container{
        width: 1200px;
        height: auto;
		margin: auto;
        display: block;
        border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

    #container #content{
        margin: 30px auto;
        padding: 20px;
        width: 85%;
        background-color: #f9f9f9;
    }

    p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }
	</style>
</head>
<body>

<div id="container">
	<h1>FRAMGIA - TRẦN ĐỨC LIÊM - Sử dụng Active Record trong CodeIgniter!</h1>
    <div class="clear"></div>
	<div id="content">
        <h2>1. Sử dụng active recode để lấy hết dữ liệu trong DB</h2>
        <h3>Active Record</h3>
        <code>public function get_all_ar(){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->get($this->_table)->result();<br/>}</code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces: return $this->db->query("SELECT * FROM research_group LIMIT 0, 50")->result();</code>
		<table border="1" style="width: 100%; border: 1px solid #a1a1a1;" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if($all_ar):?>
                    <?php foreach($all_ar as $row):?>
                        <tr>
                            <td><?php echo $row->id;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->description;?></td>
                            <td><?php echo $row->status;?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
            </tbody>
		</table>
        <br/>

        <h2>2. Sử dụng active recode để lấy dữ liệu trong DB có điều kiện</h2>
        <h3>Active Record</h3>
        <code>public function get_by_id_ar($id = 0){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->where('id', $id)->get($this->_table)->result();<br/>}</code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces: return $this->db->query("SELECT * FROM research_group where id = $id LIMIT 0, 50")->result();</code>
        <table border="1" style="width: 100%; border: 1px solid #a1a1a1;" >
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if($by_id_ar):?>
                <?php foreach($by_id_ar as $row):?>
                    <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->status;?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
        <br/>

        <h2>3. Sử dụng active recode để lấy dữ liệu trong DB theo tên trường</h2>
        <h3>Active Record</h3>
        <code>public function get_by_name_ar(){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->select('id, name, description, status')->get($this->_table)->result();<br/>}</code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces: return $this->db->query("SELECT id, name, description, status FROM research_group where id = $id LIMIT 0, 50")->result();</code>
        <table border="1" style="width: 100%; border: 1px solid #a1a1a1;" >
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if($by_name_ar):?>
                <?php foreach($by_name_ar as $row):?>
                    <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->status;?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
        <br/>

        <h2>4. Sử dụng active recode để lấy dữ liệu trong DB sử dụng Max, Min, Sum, Avg</h2>
        <h3>Active Record</h3>
        <code>public function get_max_status_ar(){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->->select_max('id')->select('name, description, status')->get($this->_table)->result();<br/>}
            Tương tự cho: MIN, AVG, SUM
        </code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces: return $this->db->query("SELECT max(id) as id, name, description, status FROM research_group LIMIT 0, 50")->result();
              Tương tự cho: MIN, AVG, SUM
        </code>
        <table border="1" style="width: 100%; border: 1px solid #a1a1a1;" >
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if($max_ar):?>
                <?php foreach($max_ar as $row):?>
                    <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->status;?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
        <br/>

        <h2>5. Sử dụng active recode để thêm mới dữ liệu vào DB</h2>
        <h3>Active Record</h3>
        <code>
            public function insert_ar($data = array()){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return return $this->db->insert($this->_table, $data);<br/>}
        </code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces:
            Produces: INSERT INTO research_groups (name, description, status) VALUES ('My title', 'My name', 1);
        </code>
        <br/>

        <h2>6. Sử dụng active recode để cập nhật dữ liệu trong DB</h2>
        <h3>Active Record</h3>
        <code>
            public function update_ar($id = 0, $data = array()){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->where('id', $id)->update($this->_table, $data);<br/>}
        </code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces:
            UPDATE research_groups
            SET name = '{$name}', description = '{$description}', status = '{$status}'
            WHERE id = $id;
        </code>
        <br/>

        <h2>7. Sử dụng active recode để xóa dữ liệu trong DB</h2>
        <h3>Active Record</h3>
        <code>
            public function delete_ar($id = 0){<br/>&nbsp;&nbsp;&nbsp;&nbsp;return $this->db->where('id', $id)->delete($this->_table);<br/>}
        </code>
        <h3>Không sử dụng Active Record</h3>
        <code>Produces:
            DELETE FROM research_groups
            WHERE id = $id;
        </code>
        <br/>

        <h2>* Thông tin</h2>
        <h3>Database</h3>
        <code>
            DROP TABLE IF EXISTS `research_groups`;
            CREATE TABLE `research_groups` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `description` varchar(250) DEFAULT NULL,
            `status` int(2) DEFAULT '1',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

            INSERT INTO `research_groups` VALUES ('1', 'admin', 'Administrator', '1');
            INSERT INTO `research_groups` VALUES ('2', 'user', 'User', '1');
            INSERT INTO `research_groups` VALUES ('3', 'spa', 'SPA', '1');
            INSERT INTO `research_groups` VALUES ('4', 'backpackers', 'City Backpackers ', '1');
            INSERT INTO `research_groups` VALUES ('5', 'grumpy', 'Grumpy Mole', '2');
            INSERT INTO `research_groups` VALUES ('6', 'vertu', 'Vertu', '1');
        </code>
        <h3>Controller</h3>
        <code>
            class Home extends CI_Controller {

            public function __construct(){
            parent::__construct();
            $this->load->model('group_m');
            }

            public function index()
            {
            $data['all_ar'] = $this->group_m->get_all_ar();
            $data['by_id_ar'] = $this->group_m->get_by_id_ar(1);
            $data['by_name_ar'] = $this->group_m->get_by_name_ar();
            $data['max_ar'] = $this->group_m->get_max_status_ar();
            $this->load->view('home/index', $data);
            }
            }
        </code>
        <br/>

	</div>
    <div class="clear"></div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    <div class="clear"></div>
</div>

</body>
</html>