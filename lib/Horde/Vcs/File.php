<?php
/**
 * Interface File
 *
 * Copyright 2008-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @package Vcs
 */
interface Horde_Vcs_File
{
    public function setRepository($rep);

    /**
     * TODO - better name, wrap an object around this?
     */
    public function getBlob($revision);

    /**
     * Has the file been deleted?
     *
     * @return boolean  Is this file deleted?
     */
    public function isDeleted();

    /**
     * Returns name of the current file without the repository extensions.
     *
     * @return string  Filename without repository extension
     */
    public function getFileName();

    /**
     * Returns the last revision of the current file on the HEAD branch.
     *
     * @return string  Last revision of the current file.
     * @throws Horde_Vcs_Exception
     */
    public function getRevision();

    /**
     * Returns the revision before the specified revision.
     *
     * @param string $rev  A revision.
     *
     * @return string  The previous revision or null if the first revision.
     */
    public function getPreviousRevision($rev);

    /**
     * Returns a log object for the most recent log entry of this file.
     *
     * @return Horde_Vcs_QuickLog  Log object of the last entry in the file.
     * @throws Horde_Vcs_Exception
     */
    public function getLastLog();

    /**
     * Sort the list of Horde_Vcs_Log objects that this file contains.
     *
     * @param integer $how  Horde_Vcs::SORT_REV (sort by revision),
     *                      Horde_Vcs::SORT_NAME (sort by author name), or
     *                      Horde_Vcs::SORT_AGE (sort by commit date).
     */
    public function applySort($how = Horde_Vcs::SORT_REV);

    /**
     * The sortBy*() functions are internally used by applySort.
     */
    public function sortByRevision($a, $b);

    public function sortByAge($a, $b);

    public function sortByName($a, $b);

    /**
     * Return the filename relative to its sourceroot.
     *
     * @return string  Pathname relative to the sourceroot.
     */
    public function getSourcerootPath();

    /**
     * Return the "base" filename (i.e. the filename needed by the various
     * command line utilities).
     *
     * @return string  A filename.
     */
    public function getPath();

    /**
     * TODO
     */
    public function getBranches();

    /**
     * TODO
     */
    public function getLog($rev = null);

    /**
     * TODO
     */
    public function revisionCount();

    /**
     * TODO
     */
    public function getTags();
}
