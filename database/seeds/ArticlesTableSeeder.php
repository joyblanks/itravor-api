<?php

use Illuminate\Database\Seeder;
use App\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        $title = ['First blog', 'Second blog', 'Third blog', 'Forth Blog', 'Fifth Blog',
        'First Video', 'Second Video','Third Video','Forth Video','Fifth Video',
        'First Image', 'Second Image','Third Image','Forth Image','Fifth Image'];
        $body =['<p>Test keywordss</p>',
        '<iframe class="ql-video" frameborder="0" allowfullscreen="true" src="https://www.youtube.com/embed/Y19sQlT3hPU?showinfo=0"></iframe><p><br></p>',
        '<p>Second video testing </p><p><br></p><iframe class="ql-video" frameborder="0" allowfullscreen="true" src="https://www.youtube.com/embed/WxhgAWXDbN8?showinfo=0"></iframe><p><br></p>',
        '<p>Video Blog no 3 </p><p><br></p><iframe class="ql-video" frameborder="0" allowfullscreen="true" src="https://www.youtube.com/embed/60x-xZCEwcY?showinfo=0"></iframe><p><br></p>',
        '<p>Blog No 4 testing </p><iframe class="ql-video" frameborder="0" allowfullscreen="true" src="https://www.youtube.com/embed/UGzJrKUBEwA?showinfo=0"></iframe><p><br></p>',
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/olgC8UvxPRs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/TLt56PLYc6I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/B-ETcMqCs4s" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/QRd3NGWvuBc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        '<iframe width="560" height="315" src="https://www.youtube.com/embed/oYQdc-P0FZk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_182252+-+Copy.jpg',
        'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_181618+-+Copy.jpg',
        'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_131703+-+Copy.jpg',
        'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171120_184515+-+Copy.jpg',
        'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_131659+-+Copy.jpg'];
       
        $type=['blog','blog','blog','blog','blog',
        'video','video','video','video','video',
        'picture','picture','picture','picture','picture'];
       
        $location=['28.5355, 77.3910', '19.0760, 72.8777','28.7041, 77.1025','28.4595, 77.0266','28.5355, 77.3910',
        '28.5355, 77.3910', '19.0760, 72.8777','28.7041, 77.1025','28.4595, 77.0266','28.5355, 77.3910',
        '28.5355, 77.3910', '19.0760, 72.8777','28.7041, 77.1025','28.4595, 77.0266','28.5355, 77.3910'];
        
        $keywords=['abc,xyz,pqr','123,456,789','delhi,noida,gurgaon','travel,trip','party,fun,outing',
        'abc,xyz,pqr','123,456,789','delhi,noida,gurgaon','travel,trip','party,fun,outing',
        'abc,xyz,pqr','123,456,789','delhi,noida,gurgaon','travel,trip','party,fun,outing' ];

        $thumbnail=['https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/final.png',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_131703.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/beetroot-apple-juice.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/Aam+Pudina+Chatni.png',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_3657.JPG',
                    'https://i.ytimg.com/vi/olgC8UvxPRs/hqdefault.jpg',
                    'https://i.ytimg.com/vi/TLt56PLYc6I/sddefault.jpg',
                    'https://i.ytimg.com/vi/B-ETcMqCs4s/sddefault.jpg',
                    'https://i.ytimg.com/vi/QRd3NGWvuBc/hqdefault.jpg',
                    'https://i.ytimg.com/vi/oYQdc-P0FZk/sddefault.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_182252+-+Copy.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_181618+-+Copy.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_131703+-+Copy.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171120_184515+-+Copy.jpg',
                    'https://s3.ap-south-1.amazonaws.com/itravor.com/Tumbnail+Images/IMG_20171119_131659+-+Copy.jpg',];
        $is_public=['1','1','1','1','1','1','1','1','1','1','1','1','1','1','1'];
        $user_id=['1','1','2','3','2','1','1','2','3','2','1','1','2','3','2'];
        
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 15; $i++) {
            $article=Article::create([
                
                'title' => $title[$i],
                'body' => $body[$i],
                'type' => $type[$i],
                'location' => $location[$i],
                'keywords' => $keywords[$i],
                'thumbnail' => $thumbnail[$i],
                'is_public' => $is_public[$i],
                'user_id' => $user_id[$i]

            ]);

            $article->categories()->attach([1,2]);
        }
    }
}
