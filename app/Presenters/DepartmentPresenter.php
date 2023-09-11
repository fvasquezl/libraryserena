<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class DepartmentPresenter extends Presenter 
{

    // public function link()
    // {
    //     return new HtmlString("<a href='" . route('users.show', $this->model->id) . "'>{$this->model->name}</a>");
    // }

    public function usersByDepartment()
    {
        $users= $this->model->users;

        $table = '<table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                    </tr>';
        foreach($users as $key=>$user){

            $table .= "<tr><td>".++$key."</td>
                            <td>".$user->name."</td>
                            <td>".$user->email."</td>
                            <td>
                                <ul class=\"list-unstyled\">
                                    <li>".$user->roles->pluck('name')->implode('</li><li>')."</li>
                                </ul>
                            </td>
                       </tr>";
        }
        $table .="</table>";

        return new HtmlString($table);
    }

    // public function notes()
    // {
    //     return $this->model->note ? $this->model->note->body : '';
    // }

    // public function tags()
    // {
    //     return $this->model->tags->pluck('name')->implode(' ,');
    // }
}