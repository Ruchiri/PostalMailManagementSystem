<?php


class letter_record
{
    private static $letter_count = 0;
    private static $ref_count = 0;
    private $id;
    private $reg_no;
    private $date;
    private $section;
    private $subject;
    private $sender;
    private $scan_copy;
    private $ref_id;
    private $replied;
    private $rep_letter;

    /**
     * letter_record constructor.
     */
    public function __construct($id, $date, $section, $subject, $sender, $scan_copy, $ref_id)
    {
        $this->id = $id;
        $this->date = $date;
        $this->section = $section;
        $this->subject = $subject;
        $this->sender = $sender;
        $this->scan_copy = $scan_copy;
        $this->ref_id = $ref_id;
    }


    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getRepLetter()
    {
        return $this->rep_letter;
    }

    /**
     * @param mixed $rep_letter
     */
    public function setRepLetter($rep_letter)
    {
        $this->rep_letter = $rep_letter;
    }

    function _destruct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRegNo()
    {
        return $this->reg_no;
    }

    /**
     * @param mixed $reg_no
     */
    public function setRegNo($reg_no)
    {
        $this->reg_no = $reg_no;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

    /**
     * @return mixed
     */
    public function getSubjetct()
    {
        return $this->subjetct;
    }

    /**
     * @param mixed $subjetct
     */
    public function setSubjetct($subjetct)
    {
        $this->subjetct = $subjetct;
    }

    /**
     * @return mixed
     */
    public function getScanCopy()
    {
        return $this->scan_copy;
    }

    /**
     * @param mixed $scan_copy
     */
    public function setScanCopy($scan_copy)
    {
        $this->scan_copy = $scan_copy;
    }

    /**
     * @return mixed
     */
    public function getRefId()
    {
        return $this->ref_id;
    }

    /**
     * @param mixed $ref_id
     */
    public function setRefId($ref_id)
    {
        $this->ref_id = $ref_id;
    }

    /**
     * @return mixed
     */
    public function getReplied()
    {
        return $this->replied;
    }

    /**
     * @param mixed $replied
     */
    public function setReplied($replied)
    {
        $this->replied = $replied;
    }


}

?>

<script>
    function showRecord() {
        echo
        '<a href="PostMailManagementSystem/letter_record_window.php?reg_no=".urlencode($red_no)."&date=".urlencode($date)."&section=".urlencode($section)."&subject=".urlencode($sender)."&sender=".urlencode($sender)."&scan_copy=".urlencode($scan_copy)."></a>';

    }

</script>
