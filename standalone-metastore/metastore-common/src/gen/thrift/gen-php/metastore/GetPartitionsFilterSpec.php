<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.16.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class GetPartitionsFilterSpec
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        7 => array(
            'var' => 'filterMode',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\metastore\PartitionFilterMode',
        ),
        8 => array(
            'var' => 'filters',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var int
     */
    public $filterMode = null;
    /**
     * @var string[]
     */
    public $filters = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['filterMode'])) {
                $this->filterMode = $vals['filterMode'];
            }
            if (isset($vals['filters'])) {
                $this->filters = $vals['filters'];
            }
        }
    }

    public function getName()
    {
        return 'GetPartitionsFilterSpec';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 7:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->filterMode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::LST) {
                        $this->filters = array();
                        $_size1297 = 0;
                        $_etype1300 = 0;
                        $xfer += $input->readListBegin($_etype1300, $_size1297);
                        for ($_i1301 = 0; $_i1301 < $_size1297; ++$_i1301) {
                            $elem1302 = null;
                            $xfer += $input->readString($elem1302);
                            $this->filters []= $elem1302;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('GetPartitionsFilterSpec');
        if ($this->filterMode !== null) {
            $xfer += $output->writeFieldBegin('filterMode', TType::I32, 7);
            $xfer += $output->writeI32($this->filterMode);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->filters !== null) {
            if (!is_array($this->filters)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('filters', TType::LST, 8);
            $output->writeListBegin(TType::STRING, count($this->filters));
            foreach ($this->filters as $iter1303) {
                $xfer += $output->writeString($iter1303);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
