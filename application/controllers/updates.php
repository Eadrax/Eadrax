<?php
/**
 * Eadrax
 *
 * Eadrax is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * Eadrax is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *                                                                                
 * You should have received a copy of the GNU General Public License
 * along with Eadrax; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @category	Eadrax
 * @package		Update
 * @author		Eadrax Team
 * @copyright	Copyright (C) 2009 Eadrax Team
 */

/**
 *
 * Updates controller added for update system.
 *
 * @category	Eadrax
 * @package		Update
 * @subpackage	Controllers
 * @author		Eadrax Team
 * @copyright	Copyright (C) 2009 Eadrax Team
 * @version		$Id$
 */
class Updates_Controller extends Core_Controller {
	/**
	 * Adds a new update.
	 *
	 * @return null
	 */
	public function index()
	{
		// Logged in users and guest users will have different abilities when 
		// submitting updates to the website.
		if ($this->logged_in == TRUE)
		{
			// If the person is logged in...MAKE SURE THEY REALLY ARE.
			$this->restrict_access();

			// Load necessary models.
			$update_model = new Update_Model;

			if ($this->input->post())
			{
				// TODO
			}
			else
			{
				// Load the necessary view.
				$update_form_view = new View('update_form');

				// Generate the content.
				$this->template->content = array($update_form_view);
			}
		}
		else
		{
			// The person is a guest...
			// TODO
		}
	}
}
