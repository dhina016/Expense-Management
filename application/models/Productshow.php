<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productshow extends CORE_Model
{

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('isdel', 0);
        $this->db->order_by('pname');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getInwardProduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('ptype', 0);
        $this->db->where('isdel', 0);
        $this->db->order_by('pname');
        $query = $this->db->get();
        return $result = $query->result();
    }
    public function getOutwardProduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('ptype', 1);
        $this->db->where('isdel', 0);
        $this->db->order_by('pname');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function editProduct($param)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $param);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function getCost()
    {
        $this->db->select('*');
        $this->db->from('cost');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function getInward()
    {
        $this->db->select("inward.pid,inward.pprice,inward.quantity,inward.totalprice,inward.date,inward.isdel,product.id,product.pname,product.isdel,inward.id");
        $this->db->from('inward');
        $this->db->join('product', 'inward.pid = product.id');
        $this->db->where('inward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->order_by('product.pname');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function getoutward()
    {
        $this->db->select("outward.pid,outward.pprice,outward.quantity,outward.totalprice,outward.date,outward.isdel,product.id,product.pname,outward.id");
        $this->db->from('outward');
        $this->db->join('product', 'outward.pid = product.id');
        $this->db->where('outward.isdel', 0);
        $this->db->order_by('product.pname');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function editInward($param)
    {
        $this->db->select('*');
        $this->db->from('inward');
        $this->db->where('id', $param);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function editOutward($param)
    {
        $this->db->select('*');
        $this->db->from('outward');
        $this->db->where('id', $param);
        $query = $this->db->get();
        return $result = $query->result();
    }


    public function getOutwardGraph()
    {
        $this->db->select("outward.pid, SUM(outward.quantity) as quantity, SUM(outward.totalprice) as totalprice, outward.isdel,product.id,product.pname,product.isdel");
        $this->db->from('outward');
        $this->db->join('product', 'outward.pid = product.id');
        $this->db->where('outward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->group_by('product.id');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function getInwardGraph()
    {
        $this->db->select("inward.pid, SUM(inward.quantity) as quantity,SUM(inward.totalprice) as totalprice, inward.isdel,product.id,product.pname,product.isdel");
        $this->db->from('inward');
        $this->db->join('product', 'inward.pid = product.id');
        $this->db->where('inward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->group_by('product.id');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function getInwardTable()
    {
        $this->db->select("inward.pid,inward.pprice, SUM(inward.quantity) as quantity,SUM(inward.totalprice) as totalprice, inward.isdel,product.id,product.pname");
        $this->db->from('inward');
        $this->db->join('product', 'inward.pid = product.id');
        $this->db->where('inward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->group_by(array('inward.pprice','product.id'));
        $this->db->order_by('product.pname');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
    public function getOutwardTable()
    {
        $this->db->select("outward.pid, outward.pprice, SUM(outward.quantity) as quantity, SUM(outward.totalprice) as totalprice, outward.isdel,product.id,product.pname");
        $this->db->from('outward');
        $this->db->join('product', 'outward.pid = product.id');
        $this->db->where('outward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->group_by(array('outward.pprice','product.id'));
        $this->db->order_by('product.pname');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
    public function getInwardDate($start, $end)
    {
        $this->db->select("inward.pid,inward.pprice,inward.quantity,inward.totalprice,inward.date,inward.isdel,product.id,product.pname,product.isdel,inward.id");
        $this->db->from('inward');
        $this->db->join('product', 'inward.pid = product.id');
        $this->db->where('inward.isdel', 0);
        $this->db->where('product.isdel', 0);
        $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start)). '" and "'. date('Y-m-d', strtotime($end)).'"');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function getOutwardDate($start, $end)
    {
        $this->db->select("outward.pid,outward.pprice,outward.quantity,outward.totalprice,outward.date,outward.isdel,product.id,product.pname,outward.id");
        $this->db->from('outward');
        $this->db->join('product', 'outward.pid = product.id');
        $this->db->where('outward.isdel', 0);
        $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start)). '" and "'. date('Y-m-d', strtotime($end)).'"');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
}
